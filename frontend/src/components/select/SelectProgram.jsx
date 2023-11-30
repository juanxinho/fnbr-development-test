/* eslint-disable react/prop-types */

import { useMemo } from "react"
import { getProgramsByArea } from "../../selectors/getProgramsByArea"

export const SelectProgram = ({program,handleInputChange,errors,handleInputFocus,handleInputBlur,area}) => {
  
  
  const programs = useMemo(()=>getProgramsByArea(area),[area])

  return (
    <>
        <select 
                id="program" 
                name="program" 
                value={program} 
                onChange={handleInputChange}
                className={errors.program ? "input-error" : ""}
                onFocus={() => handleInputFocus('program')}
                onBlur={()=>handleInputBlur('program')}
              >
                <option 
                  value="" 
                  hidden 
                  disabled 
                >
                  Select a program
                </option>
                
                {
                  programs.map((program, index) => (
                    <option key={index}>{program}</option>
                  ))
                  
                }

              </select>
              {errors.program && <span className="error-message">{errors.program}</span>}
    
    </>
  )
}
