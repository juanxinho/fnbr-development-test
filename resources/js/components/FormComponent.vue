<template>
  <div class="content-wrapper">
    <!-- As a heading -->
    <b-navbar variant="primary" type="light">
      <b-navbar-brand class="mb-1"></b-navbar-brand>
    </b-navbar>

    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <img
              src="https://www.funiber.org/themes/funiber/logos/es.svg"
              width="250"
              height="75"
            />
          </div>

          <div class="card-body">
            <b-card-text>
              <h2>
                <span style="color: blue">
                  <strong>Request Information </strong></span
                >
              </h2>
            </b-card-text>
            <validation-observer ref="objValidation">
              <b-form>
                <b-row>
                  <b-col md="6" class="mb-2">
                    <b-form-group
                      label="Knowledge Areas: "
                      label-for="knowledge-options"
                    >
                      <validation-provider
                        #default="{ errors }"
                        name="area"
                        vid="area_id"
                        rules="required"
                      >
                        <v-select
                          v-model="formData.area_id"
                          label="name"
                          placeholder="Select an area"
                          :reduce="(value) => value.id"
                          :options="listAreas"
                        >
                        </v-select>
                        <small class="text-danger">{{ errors[0] }}</small>
                      </validation-provider>
                    </b-form-group>
                  </b-col>

                  <b-col md="6" class="mb-2">
                    <b-form-group label="Program: " label-for="program-options">
                      <validation-provider
                        #default="{ errors }"
                        name="program"
                        vid="program_id"
                        rules="required"
                      >
                        <v-select
                          v-model="formData.program_id"
                          label="name"
                          placeholder="Select an program"
                          :reduce="(value) => value.id"
                          :options="computedPrograms"
                        >
                        </v-select>
                        <small class="text-danger">{{ errors[0] }}</small>
                      </validation-provider>
                    </b-form-group>
                  </b-col>
                </b-row>
                <b-row>
                  <b-col md="6" class="mb-2">
                    <b-form-group label="Names: " label-for="names">
                      <validation-provider
                        #default="{ errors }"
                        name="name"
                        vid="name"
                        rules="required"
                      >
                        <b-form-input
                          v-model="formData.name"
                          id="name"
                          placeholder="Names"
                          :state="errors.length > 0 ? false : null"
                          autofocus
                        />
                        <small class="text-danger">{{ errors[0] }}</small>
                      </validation-provider>
                    </b-form-group>
                  </b-col>

                  <b-col md="6" class="mb-2">
                    <b-form-group label="Last names: " label-for="last-name">
                      <validation-provider
                        #default="{ errors }"
                        name="lastname"
                        vid="lastname"
                        rules="required"
                      >
                        <b-form-input
                          v-model="formData.lastname"
                          :state="errors.length > 0 ? false : null"
                          id="last-name"
                          placeholder="Last names"
                        />
                        <small class="text-danger">{{ errors[0] }}</small>
                      </validation-provider>
                    </b-form-group>
                  </b-col>
                </b-row>
                <b-row>
                  <b-col md="6" class="mb-2">
                    <b-form-group label="E-mail: " label-for="mail">
                      <validation-provider
                        #default="{ errors }"
                        name="email"
                        vid="email"
                        rules="required|email"
                      >
                        <b-form-input
                          v-model="formData.email"
                          :state="errors.length > 0 ? false : null"
                          id="mail"
                          placeholder="E-mail"
                        />
                        <small class="text-danger">{{ errors[0] }}</small>
                      </validation-provider>
                    </b-form-group>
                  </b-col>

                  <b-col md="6" class="mb-2">
                    <b-form-group label="Phone: " label-for="Phone">
                      <validation-provider
                        #default="{ errors }"
                        name="phone"
                        vid="phone"
                        rules="required"
                      >
                        <b-form-input
                          v-model="formData.phone"
                          :state="errors.length > 0 ? false : null"
                          type="number"
                          id="phone"
                          placeholder="Phone"
                        />
                        <small class="text-danger">{{ errors[0] }}</small>
                      </validation-provider>
                    </b-form-group>
                  </b-col>
                </b-row>
                <b-row>
                  <b-col md="6" class="mb-2">
                    <b-form-group
                      label="Country of residence: "
                      label-for="behavior-name"
                    >
                      <validation-provider
                        #default="{ errors }"
                        name="country"
                        vid="country"
                        rules="required"
                      >
                        <v-select
                          v-model="formData.country"
                          label="name"
                          placeholder="Select Country"
                          :reduce="(value) => value.isoCode"
                          :options="countryList"
                          @input="getStates"
                        >
                        </v-select>
                        <small class="text-danger">{{ errors[0] }}</small>
                      </validation-provider>
                    </b-form-group>
                  </b-col>

                  <b-col md="6" class="mb-2">
                    <b-form-group
                      label="State: "
                      label-for="behavior-description"
                    >
                      <validation-provider
                        #default="{ errors }"
                        name="state"
                        vid="state"
                        rules="required"
                      >
                        <v-select
                          v-model="formData.state"
                          label="name"
                          placeholder="Select State"
                          :reduce="(value) => value.isoCode"
                          :options="stateList"
                          @input="getCities"
                        >
                        </v-select>
                        <small class="text-danger">{{ errors[0] }}</small>
                      </validation-provider>
                    </b-form-group>
                  </b-col>
                </b-row>
                <b-row>
                  <b-col md="6" class="mb-2">
                    <b-form-group label="City: " label-for="City-field">
                      <validation-provider
                        #default="{ errors }"
                        name="city"
                        vid="city"
                        rules="required"
                      >
                        <v-select
                          v-model="formData.city"
                          label="name"
                          placeholder="Select City"
                          :reduce="(value) => value.name"
                          :options="cityList"
                        >
                        </v-select>
                        <small class="text-danger">{{ errors[0] }}</small>
                      </validation-provider>
                    </b-form-group>
                  </b-col>

                  <b-col md="6" class="mb-2">
                    <b-form-group label="Comments: " label-for="Comments-field">
                      <validation-provider
                        #default="{ errors }"
                        name="comments"
                        vid="comments"
                      >
                        <b-form-textarea
                          v-model="formData.comments"
                          :state="errors.length > 0 ? false : null"
                          id="comments"
                          placeholder="Comments"
                        />
                        <small class="text-danger">{{ errors[0] }}</small>
                      </validation-provider>
                    </b-form-group>
                  </b-col>
                </b-row>
                <b-row>
                  <b-col md="6" class="mb-2">
                    <validation-provider
                      #default="{ errors }"
                      name="policy acceptance"
                      vid="policy_acceptance_check"
                      rules="required"
                    >
                      <b-form-checkbox
                        v-model="formData.policy_acceptance_check"
                        :state="errors.length > 0 ? false : null"
                      >
                        &nbsp; I accept the privacy policy
                      </b-form-checkbox>
                      <small class="text-danger">{{ errors[0] }}</small>
                    </validation-provider>
                  </b-col>
                </b-row>
                <b-row class="justify-content-md-center">
                  <b-col cols="12" md="auto">
                    <b-button
                      v-if="loadingBtn == false"
                      variant="primary"
                      @click="createSubmit()"
                    >
                      <b-icon icon="cursor"></b-icon>
                      Guardar</b-button
                    >

                    <b-button
                      v-if="loadingBtn == true"
                      variant="primary"
                      disabled
                    >
                      <b-spinner small type="grow" />
                      Guardando...
                    </b-button>
                  </b-col>
                </b-row>
              </b-form>
            </validation-observer>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import {
  BIcon,
  BSpinner,
  BForm,
  BFormSelect,
  BFormSelectOption,
  BFormCheckbox,
  BContainer,
  BNavbarNav,
  BNavbarBrand,
  BRow,
  BCol,
  BFormGroup,
  BFormTextarea,
  BFormInput,
  BCardText,
} from "bootstrap-vue";
import formStoreModule from "@/components/formStoreModule";
import { required, email } from "@/validations/validations";
import store from "@/store";
import { Country, State, City } from "country-state-city";
import vSelect from "vue-select";
import Swal from "sweetalert2";
import { getError } from "@/utils/helpers";
import { ValidationProvider, ValidationObserver } from "vee-validate";

export default {
  components: {
    BIcon,
    BSpinner,
    BForm,
    vSelect,
    BFormSelect,
    BFormSelectOption,
    BFormCheckbox,
    BCardText,
    BContainer,
    BNavbarNav,
    BNavbarBrand,
    BRow,
    BCol,
    BFormGroup,
    BFormTextarea,
    BFormInput,
    ValidationProvider,
    ValidationObserver,
  },
  computed: {
    computedPrograms: function () {
      this.formData.program_id = "";
      return this.listPrograms.filter(
        (item) => item.area_id == this.formData.area_id
      );
    },
  },
  mounted() {
    const MODULE_NAME = "app-form";
    if (!store.hasModule(MODULE_NAME))
      store.registerModule(MODULE_NAME, formStoreModule);
    this.getAreas();
    this.getPrograms();
    this.getCountries();
  },
  data() {
    return {
      required,
      email,
      formData: {
        name: "",
        lastname: "",
        email: "",
        phone: "",
        country: "",
        state: "",
        city: "",
        comments: "",
        policy_acceptance_check: "",
        program_id: null,
        area_id: null,
      },
      listAreas: [],
      listPrograms: [],
      countryList: [],
      stateList: [],
      cityList: [],
      loadingBtn: false,
    };
  },
  methods: {
    saveMessage() {
      Swal.fire({
        icon: "success",
        title: "Guardado con éxito",
        showConfirmButton: false,
        timer: 1500,
      });
    },
    // Método de países
    getCountries() {
      this.countryList = Country.getAllCountries();
    },
    // Método de estados
    getStates() {
      this.formData.state = "";
      this.formData.city = "";
      this.stateList = State.getStatesOfCountry(this.formData.country);
    },
    // Método de ciudades
    getCities() {
      this.cityList = City.getCitiesOfState(
        this.formData.country,
        this.formData.state
      );
    },
    // Método de areas
    getAreas() {
      store
        .dispatch("app-form/getAreas")
        .then((response) => {
          this.listAreas = response.data.objArea;
        })
        .catch((error) => {});
    },
    // Método de programas
    getPrograms() {
      store
        .dispatch("app-form/getPrograms")
        .then((response) => {
          this.listPrograms = response.data.objProgram;
        })
        .catch((error) => {});
    },
    clear() {
      for (const fields of Object.keys(this.formData)) {
        this.formData[fields] = null;
      }
    },
    // Método para guardar la información
    createSubmit() {
      this.$refs.objValidation.validate().then((success) => {
        if (success) {
          this.loadingBtn = true;
          store
            .dispatch("app-form/create", this.formData)
            .then(() => {
              this.loadingBtn = false;
              this.clear();
              this.saveMessage();
            })
            .catch((error) => {
              this.loadingBtn = false;
              if (error.response.status === 422) {
                this.$refs.objValidation.setErrors(getError(error));
              }
            });
        }
      });
    },
  },
};
</script>
