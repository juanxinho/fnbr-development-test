import countriesStatesCities from "../data/countriesStatesCities.json";

export const getStatesByCountry = (country) => {
    
    const foundStates = countriesStatesCities.find(
        states => states.name === country
    );
    return foundStates?foundStates.states:[]
};
