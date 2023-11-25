import { Box, Typography, Autocomplete, TextField, InputLabel, Checkbox, CircularProgress, Button, Alert, AlertTitle } from "@mui/material";
import { Formik, Form } from "formik";
import { useEffect, useState } from "react";
import FormField from "./FormField";
import { fetchService, fetchServiceAPI } from "../services/fetchService";
import { AreasPrograms, CountryInterface, InformationRequestSchema, initValues } from "./constants";
import React from "react";
import TelegramIcon from '@mui/icons-material/Telegram';
import "./styles.css";
import logo from "../assets/logo.png";

const FormMain = () => {

    const mainHeader = {
        "Content-Type": "application/json",
        "Accept": "application/json",
        "X-CSCAPI-KEY": process.env.REACT_APP_X_CSCAPI_KEY || "",
    };
    const [countries, setCountries] = useState<CountryInterface[]>([]);
    const [states, setStates] = useState<any[]>([]);
    const [cities, setCities] = useState<any[]>([]);
    const [showAlert, setShowAlert] = useState<any>(null);

    const [selectedCountry, setSelectedCountry] = useState<CountryInterface>({
        id: 0,
        name: "",
        iso2: "",
    });

    const [selectedState, setSelectedState] = useState<CountryInterface>({
        id: 0,
        name: "",
        iso2: "",
    });

    const [loadingCountries, setLoadingCountries] = useState<boolean>(false);
    const [loadingStates, setLoadingStates] = useState<boolean>(false);
    const [loadingCities, setLoadingCities] = useState<boolean>(false);

    useEffect(() => {
        setLoadingCountries(true);
        (async () => {
            await fetchService("https://api.countrystatecity.in/v1/countries", {
                method: "GET",
                headers: mainHeader,
            }).then((response) => {
                setCountries(response);
                setLoadingCountries(false);
            });
        })();
        return () => {
            setLoadingCities(false);
            setLoadingStates(false);
        };
    }, []);

    useEffect(() => {
        if (selectedCountry.id === 0) return;
        setLoadingStates(true);
        (async () => {
            await fetchService(`https://api.countrystatecity.in/v1/countries/${selectedCountry.iso2}/states`, {
                method: "GET",
                headers: mainHeader,
            }).then((response) => {
                setStates(response);
                setLoadingStates(false);
            });
        })();
    }, [selectedCountry]);

    useEffect(() => {
        if (selectedState.id === 0) return;
        setLoadingCities(true);
        (async () => {
            await fetchService(`https://api.countrystatecity.in/v1/countries/${selectedCountry.iso2}/states/${selectedState.iso2}/cities`, {
                method: "GET",
                headers: mainHeader,
            }).then((response) => {
                setCities(response);
                setLoadingCities(false);
            });
        })();
    }, [selectedState]);

    return (
        <Box className="wrapper">
            <Box className="header">
                <div className="bar"></div>
                <div className="wrapper-img">
                    <img src={logo} alt="logo" />
                </div>
            </Box>
            <Box className="body">
                <Typography className="title" variant="h6" fontWeight="bold" gutterBottom color="#0071ae" textAlign="start">
                    Information Request
                </Typography>
                <Formik
                    initialValues={initValues}
                    validationSchema={InformationRequestSchema}
                    onSubmit={(values, { setSubmitting, resetForm }) => {
                        setShowAlert(null);
                        (async () => {
                            await fetchServiceAPI("/register", {
                                method: "POST",
                                headers: {
                                    "Content-Type": "application/json",
                                    "Accept": "application/json",
                                },
                                data: values,
                            }).then((response) => {
                                if (response.data.status) {
                                    setShowAlert({
                                        type: "success",
                                        title: "Success",
                                        message: "Your information has been sent successfully",
                                    });
                                    resetForm();
                                } else {
                                    setShowAlert({
                                        type: "error",
                                        title: "Error",
                                        message: "Your information has not been sent successfully",
                                    });
                                }
                            }).catch((error) => {
                                console.log(error);
                            });
                            setSubmitting(false);
                        })();
                    }}>
                    {({ errors, touched, values, setValues }) => (
                        <Form className="wrapper-form">
                            <Box className="form-display">
                                <FormField
                                    label="Names"
                                    name="names"
                                    type="text"
                                    value={values.names}
                                    error={errors.names && touched.names}
                                    succes={values.names && !errors.names}
                                />
                                <FormField
                                    label="Last Names"
                                    name="lastNames"
                                    type="text"
                                    value={values.lastNames}
                                    error={errors.lastNames && touched.lastNames}
                                    succes={values.lastNames && !errors.lastNames}
                                />
                                <Autocomplete
                                    value={values.knowledgeAreas}
                                    options={AreasPrograms.map(e => e.area)}
                                    getOptionLabel={(option) => option}
                                    onChange={(event, newValue) => {
                                        setValues({ ...values, knowledgeAreas: newValue ?? "" });
                                    }}
                                    renderInput={(params) => (<TextField {...params} label="Knowledge Areas" />)}
                                />
                                <Autocomplete
                                    value={values.program}
                                    options={AreasPrograms.find(e => e.area === values.knowledgeAreas)?.programs || []}
                                    getOptionLabel={(option) => option}
                                    onChange={(event, newValue) => {
                                        setValues({ ...values, program: newValue ?? "" });
                                    }}
                                    renderInput={(params) => (<TextField {...params} label="Program" />)}
                                />
                                <Autocomplete
                                    value={values.countryOfResidence}
                                    options={countries}
                                    loading={loadingCountries}
                                    getOptionLabel={option => option.name}
                                    onChange={(_, newValue) => {
                                        setStates([]);
                                        const changeCountry = newValue ?? {
                                            id: 0,
                                            name: "",
                                            iso2: "",
                                        };
                                        setSelectedCountry(changeCountry);
                                        setValues({
                                            ...values, countryOfResidence: changeCountry,
                                            state: { id: 0, name: "", iso2: "" },
                                            city: { id: 0, name: "", iso2: "" }
                                        });
                                    }}
                                    renderInput={(params) => (
                                        <TextField {...params} label="Country of residence"
                                            InputProps={{
                                                ...params.InputProps,
                                                endAdornment: (
                                                    <React.Fragment>
                                                        {loadingCountries ? <CircularProgress color="success" size={35} /> : null}
                                                        {params.InputProps.endAdornment}
                                                    </React.Fragment>
                                                ),
                                            }}
                                        />
                                    )}
                                />
                                <Autocomplete
                                    value={values.state}
                                    options={states}
                                    getOptionLabel={option => option.name}
                                    onChange={(_, newValue) => {
                                        setCities([]);
                                        const changeState = newValue ?? {
                                            id: 0,
                                            name: "",
                                            iso2: "",
                                        };
                                        setSelectedState(changeState);
                                        setValues({ ...values, state: changeState, city: { id: 0, name: "", iso2: "" } });
                                    }}
                                    disabled={states.length === 0}
                                    loading={loadingStates}
                                    renderInput={(params) => (
                                        <TextField {...params} label="State"
                                            InputProps={{
                                                ...params.InputProps,
                                                endAdornment: (
                                                    <React.Fragment>
                                                        {loadingStates ? <CircularProgress color="success" size={35} /> : null}
                                                        {params.InputProps.endAdornment}
                                                    </React.Fragment>
                                                ),
                                            }}
                                        />
                                    )}
                                />
                                <Autocomplete
                                    value={values.city}
                                    options={cities}
                                    getOptionLabel={option => option.name}
                                    onChange={(_, newValue) => {
                                        const changeCity = newValue ?? {
                                            id: 0,
                                            name: "",
                                            iso2: "",
                                        };
                                        setValues({ ...values, city: changeCity });
                                    }}
                                    disabled={cities.length === 0}
                                    loading={loadingCities}
                                    renderInput={(params) => (<TextField {...params} label="City"
                                        InputProps={{
                                            ...params.InputProps,
                                            endAdornment: (
                                                <React.Fragment>
                                                    {loadingCities ? <CircularProgress color="success" size={35} /> : null}
                                                    {params.InputProps.endAdornment}
                                                </React.Fragment>
                                            ),
                                        }}
                                    />
                                    )}
                                />

                                <FormField
                                    label="Phone"
                                    name="phone"
                                    type="text"
                                    value={values.phone}
                                    error={errors.phone && touched.phone}
                                    succes={values.phone && !errors.phone}
                                />

                                <FormField
                                    label="E-mail"
                                    name="email"
                                    type="email"
                                    value={values.email}
                                    error={errors.email && touched.email}
                                    succes={values.email && !errors.email}
                                />
                                <FormField
                                    label="Comments"
                                    name="comments"
                                    type="Multiline"
                                    id="comments"
                                    value={values.comments}
                                    error={errors.comments && touched.comments}
                                    succes={values.comments && !errors.comments}
                                />
                                <Box className="container-checkbox">
                                    <InputLabel>
                                        I accept the <a href="">privacy policy</a></InputLabel>
                                    <Checkbox
                                        checked={values.acceptPrivacyPolicy}
                                        onChange={(event) => setValues({ ...values, acceptPrivacyPolicy: event.target.checked })}
                                        name="acceptPrivacyPolicy"
                                        color="primary" />
                                </Box>
                            </Box>


                            <Button type="submit" variant="contained"
                                disabled={Object.keys(errors).length > 0 || !values.acceptPrivacyPolicy}
                            >
                                <TelegramIcon /> &nbsp; Send
                            </Button>
                            <Box mt={1}>
                                {showAlert && (
                                    <Alert severity={showAlert.type}>
                                        <AlertTitle>{showAlert.title}</AlertTitle>
                                        {showAlert.message}
                                    </Alert>
                                )}
                            </Box>
                        </Form>
                    )}
                </Formik>
            </Box>
        </Box>
    );
};

export default FormMain;