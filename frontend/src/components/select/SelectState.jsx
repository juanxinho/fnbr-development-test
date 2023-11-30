/* eslint-disable react/prop-types */
import { useMemo } from "react"
import { getStatesByCountry } from "../../selectors/getStatesByCountry"


export const SelectState = ({state,handleInputChange,errors,handleInputFocus,handleInputBlur,country}) => {

  const states = useMemo(()=>getStatesByCountry(country),[country])
    return (
        <>
            <select 
                id="state" 
                name="state" 
                value={state} 
                onChange={handleInputChange}
                className={errors.state ? "input-error" : ""}
                onFocus={() => handleInputFocus('state')}
                onBlur={()=>handleInputBlur('state')}
              >
                <option 
                  value="" 
                  hidden 
                  disabled 
                >
                  Select state
                </option>
                {
                  states.map((state)=>(
                    <option 
                      key={state.id}
                    >
                      {state.name}
                    </option>
                  ))
                }  
              
              </select>
              {errors.state && <span className="error-message">{errors.state}</span>}

        
        </>
    )
}
