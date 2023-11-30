import { useState } from "react"

export const useForm = ( initialState={}) => {

    const [values, setvalues] = useState(initialState)
    

    const reset = () => {
        setvalues(initialState);
    }
    
    const handleInputChange= ({target}) =>{
        if(target.type=='tel'){
            target.value = target.value.replace(/[^0-9]/g,'')
        }
        const value = target.type === 'checkbox' ? target.checked : target.value;
        
        
      
        setvalues({
            ...values,
            [target.name]:value
        })
    }


    return [values,handleInputChange,reset]


}
