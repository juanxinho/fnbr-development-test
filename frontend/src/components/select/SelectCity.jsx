/* eslint-disable react/prop-types */
import { useMemo } from 'react'
import { getCitiesByState } from "../../selectors/getCitiesByState"


export const SelectCity = ({city,handleInputChange,errors,handleInputFocus,handleInputBlur,country,state}) => {

  const cities = useMemo(()=>getCitiesByState(country,state),[country,state])

    return (
        <>
            <select 
              id="city" 
              name="city" 
              value={city} 
              onChange={handleInputChange}
              className={errors.city ? "input-error" : ""}
              onFocus={() => handleInputFocus('city')}
              onBlur={()=>handleInputBlur('city')}
            >
              <option 
                  value="" 
                  hidden 
                  disabled 
                >
                  Select city
              </option>
                
              {
                cities.map(city => (
                  <option 
                  key={city.id}
                  >
                  {city.name}
                  </option>
                ))
              }

            </select>
            {errors.city && <span className="error-message">{errors.city}</span>}

        </>
    )
}
