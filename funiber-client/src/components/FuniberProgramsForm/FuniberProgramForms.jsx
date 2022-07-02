import React, { useEffect } from 'react';
import csc from 'country-state-city';
import Select from 'react-select';

import { useFormik } from 'formik';
import { useFetchAreas } from '../../hooks/useFetchAreas';
import { useFetchProgramsById } from '../../hooks/useFetchProgramsById';

export const FuniberProgramForms = () => {
  const [areaId, setAreaId] = React.useState();
  const { data: areas, loading: loadingAreas } = useFetchAreas();
  const { data: programs, loading: loadingPrograms } =
    useFetchProgramsById(areaId);

  const addressFromik = useFormik({
    initialValues: {
      area: null,
      program: null,
      first_name: '',
      last_name: '',
      email: '',
      phone: '',
      country: 'India',
      state: null,
      city: null,
      message: '',
    },
    onSubmit: (values) => console.log(values),
  });

  const countries = csc.getAllCountries();

  const updatedCountries = countries.map((country) => ({
    label: country.name,
    value: country.isoCode,
    ...country,
  }));
  const updatedStates = (countryId) =>
    csc
      .getStatesOfCountry(countryId)
      .map((state) => ({ label: state.name, value: state.isoCode, ...state }));
  const updatedCities = (countryCode, stateId) =>
    csc
      .getCitiesOfState(countryCode, stateId)
      .map((city) => ({ label: city.name, value: city.stateCode, ...city }));

  const updateArea = areas.map((area) => ({
    label: area.name,
    value: area.id,
    ...area,
  }));

  const updateProgram = programs.map((program) => ({
    label: program.name,
    value: program.area_id,
    ...program,
  }));

  const { values, handleSubmit, setFieldValue, setValues } = addressFromik;

  useEffect(() => {
    if (values.area) setAreaId(values.area?.id);
  }, [values]);

  return (
    <div className="mb-4 p-2 mx-8 sm:mt-0">
      <div className="md:grid md:grid-cols-3 md:gap-6">
        <div className="md:col-span-1">
          <div className="px-4 sm:px-0">
            <h3 className="text-lg font-medium leading-6 text-blue-500">
              Request Information
            </h3>
          </div>
        </div>
        <div className="mt-5 md:mt-0 md:col-span-3">
          <form onSubmit={handleSubmit}>
            <div className="shadow overflow-hidden sm:rounded-md">
              <div className="px-4 py-5 bg-white sm:p-6">
                <div className="grid grid-cols-6 gap-6">
                  <div className="col-span-6 sm:col-span-3">
                    <label
                      htmlFor="country"
                      className="block text-sm font-medium text-gray-700"
                    >
                      Knowledge Areas
                    </label>
                    <Select
                      id="area"
                      name="area"
                      label="area"
                      options={updateArea}
                      value={values.area}
                      onChange={(value) => {
                        setValues({ ...values, area: value });
                      }}
                      className="mt-1 block w-full py-2 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    />
                  </div>

                  <div className="col-span-6 sm:col-span-3">
                    <label
                      htmlFor="country"
                      className="block text-sm font-medium text-gray-700"
                    >
                      Program
                    </label>

                    <Select
                      id="program"
                      name="program"
                      label="program"
                      options={updateProgram}
                      value={values.program}
                      onChange={(value) => {
                        setValues({ ...values, program: value });
                      }}
                      className="mt-1 block w-full py-2 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    />
                  </div>

                  <div className="col-span-6 sm:col-span-3">
                    <label
                      htmlFor="email_address"
                      className="block text-sm font-medium text-gray-700 "
                    >
                      Names
                    </label>
                    <input
                      type="text"
                      name="first_name"
                      id="first_name"
                      value={values.first_name}
                      onChange={(e) => setValues('first_name', e.target.value)}
                      className="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    />
                  </div>

                  <div className="col-span-6 sm:col-span-3">
                    <label
                      htmlFor="country"
                      className="block text-sm font-medium text-gray-700"
                    >
                      Last names
                    </label>
                    <input
                      type="text"
                      name="last_name"
                      id="last_name"
                      value={values.last_name}
                      onChange={(e) => {
                        setValues({ ...values, last_name: e.target.value });
                      }}
                      className="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    />
                  </div>
                  <div className="col-span-6 sm:col-span-6 lg:col-span-3">
                    <label
                      htmlFor="street_address"
                      className="block text-sm font-medium text-gray-700"
                    >
                      Email
                    </label>
                    <input
                      type="email"
                      name="email"
                      id="email"
                      value={values.email}
                      onChange={(e) => {
                        setValues({ ...values, email: e.target.value });
                      }}
                      className="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    />
                  </div>

                  <div className="col-span-6 sm:col-span-6 lg:col-span-3">
                    <label
                      htmlFor="city"
                      className="block text-sm font-medium text-gray-700"
                    >
                      Phone
                    </label>
                    <input
                      type="number"
                      name="phone"
                      id="phone"
                      value={values.phone}
                      onChange={(e) => {
                        setValues({ ...values, phone: e.target.value });
                      }}
                      className="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    />
                  </div>

                  <div className="col-span-6 sm:col-span-3 lg:col-span-3">
                    <label
                      htmlFor="state"
                      className="block text-sm font-medium text-gray-700"
                    >
                      Country of residence
                    </label>
                    <Select
                      id="country"
                      name="country"
                      label="country"
                      options={updatedCountries}
                      value={values.country}
                      onChange={(value) => {
                        setValues(
                          { country: value, state: null, city: null },
                          false,
                        );
                      }}
                      className="mt-1 block w-full py-2 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    />
                  </div>

                  <div className="col-span-6 sm:col-span-3 lg:col-span-3">
                    <label
                      htmlFor="postal_code"
                      className="block text-sm font-medium text-gray-700"
                    >
                      State
                    </label>
                    <Select
                      id="state"
                      name="state"
                      options={updatedStates(
                        values.country ? values.country.value : null,
                      )}
                      value={values.state}
                      onChange={(value) => {
                        setValues({ state: value, city: null }, false);
                      }}
                      className="mt-1 block w-full py-2  bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    />
                  </div>
                  <div className="col-span-6 sm:col-span-3 lg:col-span-3">
                    <label
                      htmlFor="postal_code"
                      className="block text-sm font-medium text-gray-700"
                    >
                      City
                    </label>
                    <Select
                      id="city"
                      name="city"
                      options={updatedCities(
                        values.state?.countryCode,
                        values.state?.value,
                      )}
                      value={values.city}
                      onChange={(value) => setFieldValue('city', value)}
                      className="mt-1 block w-full py-2  bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    />
                  </div>
                  <div className="col-span-6 sm:col-span-3 lg:col-span-3">
                    <label
                      htmlFor="postal_code"
                      className="block text-sm font-medium text-gray-700 p-1"
                    >
                      Comments
                    </label>
                    <textarea
                      id="message"
                      name="message"
                      rows="4"
                      className="block p-2.5 w-full text-sm text-gray-900 bg-gray-100 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500    dark:focus:ring-blue-500 dark:focus:border-blue-500"
                      placeholder="Your message..."
                    ></textarea>
                  </div>
                </div>
              </div>

              <div className="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <div className="flex items-center p-2">
                  <input
                    defaultChecked={true}
                    id="checkbox-1"
                    type="checkbox"
                    value=""
                    className="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                  />
                  <label
                    htmlFor="checkbox-1"
                    className="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                  >
                    I accept the{' '}
                    <a
                      href="#"
                      className="text-blue-600 hover:underline dark:text-blue-500"
                    >
                      the privacy policy
                    </a>
                    .
                  </label>
                </div>
                <button
                  type="submit"
                  className="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                  Send
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  );
};
