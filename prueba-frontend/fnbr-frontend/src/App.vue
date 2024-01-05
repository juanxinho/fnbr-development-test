<template>
    <div>
        <Header />
    </div>

    <div class="content">
        <div>
            <div class="mx-12 pt-10 font-medium text-xl text-sky-800">
                <h1>Request Information</h1>
            </div>

            <form @submit.prevent="saveData">
                <div class="grid gap-6 mb-6 md:grid-cols-2 mx-12 my-4">
                    <div>
                        <label for="area" class="block mb-2 text-sm font-medium text-gray-700">Knowledge
                            Areas</label>
                        <select v-model="user.area" id="area" name="area" @change='getPrograms()'
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                            required>
                            <option value="" disabled selected>Select an area</option>
                            <option v-for='data in user.areas' :value='data.id'>{{ data.name }}</option>
                        </select>
                    </div>
                    <div>
                        <label for="program" class="block mb-2 text-sm font-medium text-gray-700">Program</label>
                        <select v-model="user.program" id="program" name="program"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                            required>
                            <option value="" disabled selected>Select a program</option>
                            <option v-for='data in user.programs' :value='data.id'>{{ data.name }}</option>
                        </select>
                    </div>
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-700">Name</label>
                        <input type="text" v-model="user.name" id="name" name="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                            placeholder="Name" required>
                        <div v-if="errors.name" class="text-red-600">{{ errors.name }}</div>
                    </div>
                    <div>
                        <label for="lastname" class="block mb-2 text-sm font-medium text-gray-700">Lastname</label>
                        <input type="text" v-model="user.lastname" id="lastname" name="lastname"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                            placeholder="Lastname" required>
                        <div v-if="errors.lastname" class="text-red-600">{{ errors.lastname }}</div>

                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-700">E-mail</label>
                        <input type="email" v-model="user.email" id="email" name="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                            placeholder="E-mail" required>
                        <div v-if="errors.email" class="text-red-600">{{ errors.email }}</div>

                    </div>
                    <div>
                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-700">Phone</label>
                        <input type="text" v-model="user.phone" id="phone" name="phone"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                            placeholder="Phone" required>
                        <div v-if="errors.phone" class="text-red-600">{{ errors.phone }}</div>

                    </div>
                    <div>
                        <label for="country" class="block mb-2 text-sm font-medium text-gray-700">Country of
                            residence</label>
                        <select v-model="user.country" id="country_id" name="country_id" @change='getStates()'
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                            required>
                            <option value="" disabled selected>Select Country</option>
                            <option v-for='data in user.countries' :value='data.id'>{{ data.name }}</option>
                        </select>
                    </div>
                    <div>
                        <label for="state" class="block mb-2 text-sm font-medium text-gray-700">State</label>
                        <select v-model="user.state" id="state_id" name="state_id" @change='getCities()'
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                            required>
                            <option value="" disabled selected>Select a state</option>
                            <option v-for='data in user.states' :value='data.id'>{{ data.name }}</option>
                        </select>
                    </div>
                    <div>
                        <label for="city" class="block mb-2 text-sm font-medium text-gray-700">City</label>
                        <select v-model="user.city" id="city_id" name="city_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                            <option value="" disabled selected>Select a city</option>
                            <option v-for='data in user.cities' :value='data.id'>{{ data.name }}</option>
                        </select>
                    </div>
                    <div>
                        <label for="comments" class="block mb-2 text-sm font-medium text-gray-700">Comments</label>
                        <textarea v-model="user.comments" id="comments" rows="4" name="comments"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                            placeholder="Comments..."></textarea>
                    </div>
                </div>

                <div class="flex items-start mb-6 mx-12 my-4">
                    <div class="flex items-center h-5">
                        <input v-model="user.policies_check" id="agree" type="checkbox" value=""
                            class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800"
                            required>
                    </div>
                    <label for="agree" class="ms-2 text-sm font-medium text-gray-900">I accept the
                        <a href="javascript:void(0)" class="text-sky-600 hover:underline">privacy
                            policy
                        </a></label>
                </div>
                <div class="grid justify-center items-center">
                    <button type="submit"
                        class="text-white bg-sky-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full h-10 sm:h-10 sm:w-auto px-4 py-2.5 text-center dark:hover:bg-blue-700 dark:focus:ring-blue-800 flex items-center">
                        <span class="">
                            <img src="/imgs/telegram.svg" class="w-8 h-8">
                        </span>Send</button>
                </div>

                <div v-if="showSuccessMessage" class="mx-12 mt-4 text-green-600">
                    {{ registrationStatus.message }}
                </div>

                <div v-if="showErrorMessage" class="mx-12 mt-4 text-red-600">
                    {{ registrationStatus.message }}
                </div>
            </form>
        </div>
    </div>

    <div>
        <Footer />
    </div>
</template>

<script>
import Header from './components/Header.vue'
import Footer from './components/Footer.vue'
import axios from 'axios'
export default {
    components: {
        Header,
        Footer
    },
    data() {
        return {
            result: {},
            user: {
                name: '',
                lastname: '',
                email: '',
                phone: '',
                country: '',
                countries: [],
                state: '',
                states: [],
                city: '',
                cities: [],
                area: '',
                areas: [],
                program: '',
                programs: [],
                comments: '',
                policies_check: '',
            },
            errors: {
                name: null,
                lastname: null,
                email: null,
                phone: null,
                // ...otros campos
            },
            registrationStatus: null,
            showSuccessMessage: false,
            showErrorMessage: false,
        }
    },
    mounted() {
        this.getCountries();
        this.getAreas();
        this.getStates();
    },
    created() {
        this.getCountries();
    },
    methods: {
        getCountries() {
            axios.get("http://prueba-fnbr-backend.test/api/getCountries")
                .then(response => {
                    this.user.countries = response.data;
                })
                .catch(error => {
                    console.error('Error getting countries', error);
                });
        },
        getStates() {
            this.user.state = '';
            axios.get("http://prueba-fnbr-backend.test/api/getStates", {
                params: {
                    country_id: this.user.country
                }
            })
                .then(response => {
                    this.user.states = response.data;
                    this.getCities();
                })
                .catch(error => {
                    console.error('Error getting states', error);
                });
        },
        getCities() {
            axios.get("http://prueba-fnbr-backend.test/api/getCities", {
                params: {
                    state_id: this.user.state
                }
            })
                .then(response => {
                    this.user.cities = response.data;
                })
                .catch(error => {
                    console.error('Error getting cities', error);
                });
        },
        getAreas() {
            axios.get("http://prueba-fnbr-backend.test/api/getAreas")
                .then(response => {
                    this.user.areas = response.data;
                })
                .catch(error => {
                    console.error('Error getting areas', error);
                });
        },
        getPrograms() {
            axios.get("http://prueba-fnbr-backend.test/api/getPrograms", {
                params: {
                    area_id: this.user.area
                }
            })
                .then(response => {
                    this.user.programs = response.data;
                })
                .catch(error => {
                    console.error('Error getting programs', error);
                });
        },
        async saveData() {
            if (this.user.policies_check) {
                this.user.policies_check = true;
                const selectedArea = this.user.areas.find(area => area.id === this.user.area);
                const selectedProgram = this.user.programs.find(program => program.id === this.user.program);
                const selectedCountry = this.user.countries.find(country => country.id === this.user.country);
                const selectedState = this.user.states.find(state => state.id === this.user.state);
                const selectedCity = this.user.cities.find(city => city.id === this.user.city);

                const dataToSend = {
                    name: this.user.name,
                    lastname: this.user.lastname,
                    email: this.user.email,
                    phone: this.user.phone,
                    country_id: selectedCountry ? selectedCountry.id : null,
                    state_id: selectedState ? selectedState.id : null,
                    city_id: selectedCity ? selectedCity.id : null,
                    area_id: selectedArea ? selectedArea.id : null,
                    program_id: selectedProgram ? selectedProgram.id : null,
                    comments: this.user.comments,
                    policy_acceptance_check: this.user.policies_check,
                };

                try {
                    const response = await axios.post(
                        "http://prueba-fnbr-backend.test/api/v1/usuarios",
                        dataToSend
                    );

                    this.registrationStatus = {
                        success: true,
                        message: "Successfully registered user",
                    };

                    this.user = {
                        name: '',
                        lastname: '',
                        email: '',
                        phone: '',
                        country: '',
                        countries: [],
                        state: '',
                        states: [],
                        city: '',
                        cities: [],
                        area: '',
                        areas: [],
                        program: '',
                        programs: [],
                        comments: '',
                        policies_check: '',
                    };
                    this.getCountries();
                    this.getAreas();
                    this.showSuccessMessage = true;

                    setTimeout(() => {
                        this.showSuccessMessage = false;
                    }, 2000);
                } catch (error) {
                    if (error.response.status === 422) {
                        
                        this.errors = {
                            name: null,
                            lastname: null,
                            email: null,
                            phone: null,
                            
                        };

                        
                        const validationErrors = error.response.data.errors;
                        Object.keys(validationErrors).forEach((field) => {
                            this.errors[field] = validationErrors[field][0];
                        });

                        
                    setTimeout(() => {
                        Object.keys(this.errors).forEach((field) => {
                            this.errors[field] = null;
                        });
                    }, 2000);

                    } else {
                        this.registrationStatus = {
                            success: false,
                            message: "Error registering user.",
                        };

                        this.showErrorMessage = true;

                        setTimeout(() => {
                            this.showErrorMessage = false;
                        }, 2000);
                    }
                }
            } else {
                this.registrationStatus = {
                    success: false,
                    message: "You must accept the privacy policies.",
                };
            }
        },
    }
};
</script>
