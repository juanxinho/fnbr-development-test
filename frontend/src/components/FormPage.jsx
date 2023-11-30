
import { useState } from "react";
import { useForm } from "../hooks/useForm"
import Send from "./icons/Send"
import { Validation } from "../helpers/validation";
import { SelectArea } from "./select/SelectArea";
import { SelectCountry } from "./select/SelectCountry";
import { SelectCity } from "./select/SelectCity";
import { SelectState } from "./select/SelectState";
import { SelectProgram } from "./select/SelectProgram";
console.log(import.meta.env.VITE_API);

export const FormPage = () => {
  
  const [formValues,handleInputChange,reset]=useForm({
    area:"",
    name:"",
    email:"",
    country:"Ecuador",
    city:"",
    program:"",
    lastnames:"",
    phone:"",
    state:"",
    comment:"",
    terms:false
  })


  

  
  const{area,name,email,country,city,program,lastnames,phone,state,comment,terms}=formValues;

  const validateInputs = Validation(formValues);
  const [errors, setErrors] = useState({});
  
  const [submissionSuccess, setSubmissionSuccess] = useState(false);

  
  const handleSubmit= async (e)=>{
    e.preventDefault();
        const formErrors = validateInputs();
        if (Object.keys(formErrors).length === 0 && terms) {
          try {
            const formCopy = { ...formValues };
            delete formCopy.terms;
            console.log(formCopy)
            const response = await fetch("http://localhost:5000/api/forms", {
              method: 'POST',
              headers: {
                'Content-Type': 'application/json',
              },
              body: JSON.stringify(formCopy), 
            });
    
            if (response.ok) {
              console.log('Datos enviados correctamente');
              reset(); 
              setSubmissionSuccess(true); 
              setTimeout(() => {
                setSubmissionSuccess(false); 
              }, 3000);
            } else {
              console.error('Error al enviar datos');
            }
          } catch (error) {
            console.error('Error en la solicitud:', error);
          }
        } else {
            console.log("El formulario contiene errores, por favor revisa los campos");
            setErrors(formErrors);
        }
    
  }

  const handleInputFocus = (fieldName) => {
    setErrors((prevErrors) => ({
        ...prevErrors,
        [fieldName]: '' 
    }));
  };

  const handleInputBlur = (fieldName) => {
    const formErrors = validateInputs();
    
    
    if(formErrors[fieldName]){
      console.log(formErrors[fieldName])
      setErrors((prevErrors) => ({
        ...prevErrors,
        [fieldName]: formErrors[fieldName]
      }));
    } 

  };
   

    return (
    <>
      <h3>Request Information</h3>

    <form className="formulario" onSubmit={handleSubmit}>
      <div className="fieldset-container">
        <fieldset>


            <label htmlFor="area">Knowledge Areas</label>
            <SelectArea area={area} 
            handleInputChange={handleInputChange} 
            errors={errors} 
            handleInputFocus={handleInputFocus} 
            handleInputBlur={handleInputBlur} />

            <label htmlFor="name">Names</label>
            <input
              type="text"
              name="name"
              id="name"
              placeholder="Names"
              value={name}
              onChange={handleInputChange}
              className={errors.name ? "input-error" : ""}
              onFocus={() => handleInputFocus('name')}
              onBlur={()=>handleInputBlur('name')}
            />
            {errors.name && <span className="error-message">{errors.name}</span>}
           


            <label htmlFor="email">E-mail</label>
            <input
              type="email"
              name="email"
              id="email" 
              placeholder="E-mail"
              value={email}
              onChange={handleInputChange}
              className={errors.email ? "input-error" : ""}
              onFocus={() => handleInputFocus('email')}
              onBlur={()=>handleInputBlur('email')}
            />
            {errors.email && <span className="error-message">{errors.email}</span>}

            <label htmlFor="country">Country of residence</label>
            <SelectCountry country={country} 
            handleInputChange={handleInputChange} 
            errors={errors} 
            handleInputFocus={handleInputFocus} 
            handleInputBlur={handleInputBlur} />

            

            <label htmlFor="city">City</label>
            <SelectCity city={city} 
            handleInputChange={handleInputChange} 
            errors={errors} 
            handleInputFocus={handleInputFocus} 
            handleInputBlur={handleInputBlur}
            country={country}
            state={state} 
            />



        
          
          </fieldset>

          <fieldset>

              <label htmlFor="program">Program</label>
              <SelectProgram program={program} 
              handleInputChange={handleInputChange} 
              errors={errors} 
              handleInputFocus={handleInputFocus} 
              handleInputBlur={handleInputBlur} 
              area={area} 
              />


              <label htmlFor="lastnames">Last names</label>
              <input
                type="text"
                name="lastnames"
                id="lastnames"
                placeholder="Last names"
                value={lastnames}
                onChange={handleInputChange}
                className={errors.lastnames ? "input-error" : ""}
                onFocus={() => handleInputFocus('lastnames')}
                onBlur={()=>handleInputBlur('lastnames')}

              />
              {errors.lastnames && <span className="error-message">{errors.lastnames}</span>}


              <label htmlFor="phone">Phone</label>
              <input
                type="tel"
                name="phone" 
                id="phone"
                placeholder="Phone"
                value={phone}
                onChange={handleInputChange}
                className={errors.phone ? "input-error" : ""}
                onFocus={() => handleInputFocus('phone')}
                onBlur={()=>handleInputBlur('phone')}

              />
              {errors.phone && <span className="error-message">{errors.phone}</span>}


              <label htmlFor="state">State</label>
              <SelectState state={state} 
              handleInputChange={handleInputChange} 
              errors={errors} 
              handleInputFocus={handleInputFocus} 
              handleInputBlur={handleInputBlur}
              country={country}
              />

              <label htmlFor="comment">Comments</label>

              <textarea 
                id="comment"
                name="comment" 
                rows="6"
                placeholder="Comments" 
                value={comment}
                onChange={handleInputChange}

              />
              

          </fieldset>
          
          
      </div>

      <div className="checkbox-container">
        <input 
          type="checkbox" 
          id="terms" 
          name="terms" 
          checked={terms} 
          onChange={handleInputChange}
          className={errors.terms ? "input-error" : ""}
          onFocus={() => handleInputFocus('terms')}
          onBlur={()=>handleInputBlur('terms')}
        />
        <label htmlFor="terms">I accept the privacy policy</label>
      </div>
      {errors.terms && <span className="error-message">{errors.terms}</span>}

      <button  type="submit" className="send-button">
        <Send/><p>Send</p>
      </button>
      {submissionSuccess && (
      <div className="success-message">
        <h3>Form submitted successfully!</h3>
      </div>
      )}
    
    </form>
    
    </>
    )
}
