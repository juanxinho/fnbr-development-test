import countriesStatesCities from "../data/countriesStatesCities.json";

export const getCitiesByState = (country,state) => {

    const foundStates = countriesStatesCities.find(
        states => states.name === country
    );

    const foundCities = foundStates.states.find(
        cities => cities.name == state
    );


    
    return foundCities?foundCities.cities:[]
}