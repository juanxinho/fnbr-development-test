/* eslint-disable react/prop-types */

import { areas } from "../../data/areas"

export const SelectArea = ({area,handleInputChange,errors,handleInputFocus,handleInputBlur}) => {
    return (
        <>
            <select 
              value={area} 
              id="area" 
              name="area" 
              onChange={handleInputChange}
              className={errors.area ? "input-error" : ""}
              onFocus={() => handleInputFocus('area')}
              onBlur={()=>handleInputBlur('area')}
            >
              <option 
                value="" 
                hidden 
                disabled 
              >
                Select an area
              </option>
              
              {
                areas.map((area, index) => (
                  <option key={index}>
                    {area.area}
                  </option>
                ))
              }

              
              
              
            </select>
            {errors.area && <span className="error-message">{errors.area}</span>}

        
        </>
    )
}
