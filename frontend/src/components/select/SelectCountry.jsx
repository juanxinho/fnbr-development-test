/* eslint-disable react/prop-types */
import countriesStatesCities from "../../data/countriesStatesCities.json";

export const SelectCountry = ({country,handleInputChange,errors,handleInputFocus,handleInputBlur}) => {
    return (
        <>
            <select 
              id="country" 
              name="country" 
              value={country} 
              onChange={handleInputChange}
              className={errors.country ? "input-error" : ""}
              onFocus={() => handleInputFocus('country')}
              onBlur={()=>handleInputBlur('country')}
            >
              {
                countriesStatesCities.map(country=>(
                  <option key={country.id}>
                    {country.name}
                  </option>
                ))
              }
            </select>
            {errors.country && <span className="error-message">{errors.country}</span>}
        </>
    )
}
