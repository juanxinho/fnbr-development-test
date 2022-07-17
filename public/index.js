import { FormValidations } from "./helpers/validacion_formulario.js";
import dataApis from "./helpers/dataApis.js";
import { getData } from "./helpers/ajax.js";

const d = document;
const $selectArea = d.querySelector('#selectArea');
const $selectCountry = d.querySelector('#selectCountry');
const $selectState = d.querySelector('#selectState');
const $selectCity = d.querySelector('#selectCity');
const $form = d.querySelector(".form");


let areas_programs;
let countries;
let states;
let cities;


const addOptions = (objDom, arrValores) => {
    const $fragment = document.createDocumentFragment();
    objDom.innerHTML = ''
    arrValores.forEach(el => {
        const $option= document.createElement("option");
        $option.value = el.name ? el.name : el;
        $option.id = el.id? el.id : arrValores.indexOf(el);
        // $option.value = el.id ? el.id : arrValores.indexOf(el);
        $option.innerHTML = `${el.name ? el.name : el}`;
        $fragment.appendChild($option);
    });
    let optionPlaceholder = d.createElement("option");
    optionPlaceholder.value = null;
    optionPlaceholder.hidden = true;
    optionPlaceholder.textContent = "Select an option"
    objDom.appendChild(optionPlaceholder);
    objDom.appendChild($fragment);
    objDom.disabled = false;
}


const inicializarFormulario = async() => {
    areas_programs = await getData(dataApis.urlAreas);
    countries = await getData(dataApis.urlPaises);
    states = await getData(dataApis.urlStates);
    cities = await getData(dataApis.urlCities);

    addOptions($selectArea, areas_programs);
    addOptions($selectCountry, countries.countries);
}


const manejadorCambios = async (e) => {
    if(e.target.matches('#selectArea')){
        console.log(e.target)
        let programsFiltered = areas_programs[(e.target.selectedIndex)-1].programs;
        const $selectProgram = d.querySelector('#selectProgram');
        addOptions($selectProgram, programsFiltered)

    }else if(e.target.matches('#selectCountry')){

        let statesFiltered = states.states.filter(state => state.country_id === e.target.selectedOptions[0].id);
        addOptions($selectState, statesFiltered);

        $selectCity.innerHTML = ""

    }else if(e.target.matches('#selectState')){

        let citiesFiltered = cities.cities.filter( city => city.state_id === e.target.selectedOptions[0].id);
        addOptions($selectCity, citiesFiltered)
    }

}

d.addEventListener('DOMContentLoaded', inicializarFormulario);
d.addEventListener('change', manejadorCambios);



d.addEventListener("submit", e=>{
    e.preventDefault();
    const $loader = d.querySelector(".form-loader");
    const $response = d.querySelector(".form-response");
    $loader.classList.remove("none");
    console.log(e.target);

    fetch( "form_register.php", {
        method: "POST",
        body: new FormData(e.target)
    })
    .then(res => res.ok ? res.json() : Promise.reject(res))
    .then(json => {
        console.log(json);
        $loader.classList.add("none");
        $response.classList.remove("none");
        $response.querySelector('.name-user').innerHTML = `${json.message.name}`
        $form.reset();
    })
    .catch(err => {
        console.log(err);
        let message = err.statusText || "Ocurrio un error al enviar, intenta nuevamente";
        $response.querySelector('.card-response').innerHTML = `<p> Error ${err.status}: ${message}</p>`
        $loader.classList.add("none");

    })
    .finally( ()=> setTimeout( ()=>{
        $response.classList.add("none")
    }, 6000));

});


FormValidations();