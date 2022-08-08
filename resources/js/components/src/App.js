import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import Api from '../src/Api';
import Select from 'react-select';
import axios from 'axios';
import Swal from 'sweetalert2';
import FadeLoader from "react-spinners/FadeLoader";

export default class App extends Component {
  constructor(props) {
    super(props);
    this.state = {
      names: '',
      lastnames: '',
      email: '',
      phone: '',
      comments: '',
      policy: false,

      areas: [],
      programs: [],

      areaSelected: '',
      programSelected: '',

      countries: [],
      states: [],
      cities: [],

      countrySelected: 'Afghanistan',
      stateSelected: 'Alabama',
      citySelected: 'Anchorage',

      loading: false,
    };

    this.handleChangeNames = this.handleChangeNames.bind(this);
    this.handleChangeLastNames = this.handleChangeLastNames.bind(this);
    this.handleChangeEmail = this.handleChangeEmail.bind(this);
    this.handleChangePhone = this.handleChangePhone.bind(this);
    this.handleChangeComment = this.handleChangeComment.bind(this);

    this.handleChangePolicy = this.handleChangePolicy.bind(this);
    this.handleChangeCountry = this.handleChangeCountry.bind(this);
    this.handleChangeState = this.handleChangeState.bind(this);
    this.handleChangeCity = this.handleChangeCity.bind(this);

    this.handleChangeArea = this.handleChangeArea.bind(this);
    this.handleChangePrograms = this.handleChangePrograms.bind(this);

    this.handleSubmit = this.handleSubmit.bind(this);
  }

  componentWillMount () {
    this.getCountries();
    this.getAreas();
  }

  handleChangeNames = e => {
    this.setState({ names: e.target.value });
  }

  handleChangeLastNames = e => {
    this.setState({ lastnames: e.target.value });
  }

  handleChangeEmail = e => {
    this.setState({ email: e.target.value });
  }

  handleChangePhone = e => {
    this.setState({ phone: e.target.value });
  }

  handleChangeComment = e => {
    this.setState({ comments: e.target.value });
  }

  handleChangePolicy () {
    this.setState(({ policy }) => (
      {
        policy: !policy,
      }
    ));
  }

  /**
   *
   * Countries, states, and cities
   */
  handleChangeCountry (countrySelected) {
    this.setState({ countrySelected });
    this.setState({ stateSelected: null });
    this.setState({ citySelected: null });

    Api
      .get(`/api/states/${countrySelected.label}`)
      .then(response => {
        const states = [];
        response.data.map((resp, index) => {
          states.push({
            'value': (index + 1),
            'label': resp.state_name
          })
        });

        this.setState({ states });
      });
  }

  handleChangeState (stateSelected) {
    this.setState({ stateSelected });

    Api
      .get(`/api/cities/${stateSelected.label}`)
      .then(response => {
        const cities = [];
        response.data.map((resp, index) => {
          cities.push({
            'value': (index + 1),
            'label': resp.city_name
          })
        });

        this.setState({ cities });
      });
  }

  handleChangeCity (citySelected) {
    this.setState({ citySelected });
  }

  getCountries() {
    Api
      .get('/api/countries/')
      .then(response => {
        const countries = [];
        response.data.map((resp, index) => {
          countries.push({
            'value': (index + 1),
            'label': resp.country_name
          })
        });

        this.setState({ countries });
      });
  }

  /**
   *
   * Areas and Programs
   */
  getAreas () {
    axios
      .get('/api/areas')
      .then(response => {
        const areas = response.data;
        this.setState({ areas });
      });
  }

  handleChangeArea (areaSelected) {
    this.setState({ areaSelected });

    axios
      .get(`/api/areas/${areaSelected.value}/programs`)
      .then(response => {
        const programs = response.data;
        this.setState({ programs });
      });
  }

  handleChangePrograms (programSelected) {
    this.setState({ programSelected });
  }


  handleSubmit(e) {
    e.preventDefault();

    const info = {
      names: this.state.names,
      lastnames: this.state.lastnames,
      email: this.state.email,
      phone: this.state.phone,
      area_id: this.state.areaSelected.value,
      program_id: this.state.programSelected.value,
      country: this.state.countrySelected.label,
      state: this.state.stateSelected.label,
      city: this.state.citySelected.label,
      comments: this.state.comments,
      policy: this.state.policy,
    }

    window.scrollTo({top: 0, left: 0, behavior: 'smooth'});

    this.setState(({ loading }) => (
      {
        loading: !loading,
      }
    ));

    axios
      .post('/api/contacts', info)
      .then(response => {
        if (response) {
          this.setState(({ loading }) => (
            {
              loading: !loading,
            }
          ));

          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
          })

          Toast.fire({
            icon: 'success',
            title: 'Datos enviados correctamente.'
          })
        }
      })
      .catch(err => {
        this.setState(({ loading }) => (
          {
            loading: !loading,
          }
        ));

        let htmlError = '<ul>';

        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 4000,
          timerProgressBar: true,
          didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
          }
        })

        err.response.data.errors.map(error => {
          htmlError +=`<li>${error}</li>`
        });

        htmlError += '</ul>';

        Toast.fire({
          icon: 'error',
          title: htmlError
        })
      })
  }

  render() {
    const override = {
      display: "block",
      margin: "0 auto",
      borderColor: "red",
    };

    const {
      countrySelected,
      stateSelected,
      citySelected,
      countries,
      states,
      cities
    } = this.state;

    return (
      <div>
        <nav className="navbar navbar-dark" style={{backgroundColor: "#1777b1", height: 33}}></nav>

        <div className="container">
          <br></br>
          <img src="/logo.png" width={200} height={60}></img>
        </div>

        <hr />
        <br></br>
        <br></br>
        <div className="container">
          <div className="row justify-content-start">

            <FadeLoader loading={this.state.loading} cssOverride={override} height={15} width={6} radius={2} margin={2} />

            <form onSubmit={this.handleSubmit}>
              <div className="form-group">
                <h4 style={{fontSize:20, color:"#1777b1"}}>Request Information</h4>
              </div>
              <br></br>
              <div className="row">
                <div className="col-md-6">
                  <div className="form-group">
                    <label>Knowledge Areas</label>
                    <Select
                      value={this.state.areaSelected}
                      onChange={this.handleChangeArea}
                      options={this.state.areas}
                    />
                  </div>
                  <br></br>
                  <div className="form-group">
                    <label>Names</label>
                    <input type="text" required className="form-control" name="names" onChange={this.handleChangeNames} placeholder="Names" />
                  </div>
                  <br></br>
                  <div className="form-group">
                    <label>E-mail</label>
                    <input type="email" required className="form-control" name="email" onChange={this.handleChangeEmail} placeholder="E-mail" />
                  </div>
                  <br></br>
                  <div className="form-group">
                    <label>Country of residence</label>
                    <Select
                      value={countrySelected}
                      onChange={this.handleChangeCountry}
                      options={countries}
                    />
                  </div>
                  <br></br>
                  <div className="form-group">
                    <label>City</label>
                    <Select
                      value={citySelected}
                      onChange={this.handleChangeCity}
                      options={cities}
                    />
                  </div>
                  <br></br>
                </div>
                <div className="col-md-6">
                  <div className="form-group">
                    <label className="font-weight-bold">Program</label>
                    <Select
                      value={this.state.programSelected}
                      onChange={this.handleChangePrograms}
                      options={this.state.programs}
                    />
                  </div>
                  <br></br>
                  <div className="form-group">
                    <label className="font-weight-bold">Last names</label>
                    <input type="text" required className="form-control" name="lastnames" onChange={this.handleChangeLastNames} placeholder="Last names" aria-label="Last names" />
                  </div>
                  <br></br>
                  <div className="form-group">
                    <label className="font-weight-bold">Phone</label>
                    <input type="text" required className="form-control" placeholder="Phone" name="phone" onChange={this.handleChangePhone} aria-label="Phone" />
                  </div>
                  <br></br>
                  <div className="form-group">
                    <label className="font-weight-bold">State</label>
                    <Select
                      value={stateSelected}
                      onChange={this.handleChangeState}
                      options={states}
                    />
                  </div>
                  <br></br>
                  <div className="form-group">
                    <label className="font-weight-bold">Comments</label>
                    <textarea
                      onChange={this.handleChangeComment}
                      value={this.state.comments}
                      className="form-control"
                      rows="2"
                      maxLength="255"
                      placeholder="Comments"
                    />
                  </div>
                </div>
              </div>

              <div className="form-check">
                <input type="checkbox" name="policy" checked={this.state.policy} onChange={this.handleChangePolicy} className="form-check-input" id="policy" />
                <label className="form-check-label">I accept the <a href="#">privacy policy</a></label>
              </div>

              <div className="form-group text-center">
                <button type="submit" className="btn btn-info text-light btn-sm">
                  <i className="fa-solid fa-paper-plane"></i>&nbsp;
                  Send
                </button>
              </div>
            </form>

          </div>

        </div>

        <br></br>
        <br></br>
        <footer className="page-footer font-small pt-1" style={{backgroundColor:"Grey", color:"white", fontSize: 12}}>
          <div className="container footer-copyright py-2">Copyright 2005 - 2022. Ibero-American University Foundation - All rights reserved
          </div>
        </footer>
      </div>
    );
  }
}
