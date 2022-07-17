const d = document;

export function FormValidations(){
    const $inputs = d.querySelectorAll(".form [required]");

    $inputs.forEach(input =>{
        const $span = document.createElement("span");
        $span.id = input.name;
        $span.textContent = input.title;
        $span.classList.add("form-error", "none");
        input.insertAdjacentElement("afterend", $span);
    });

    d.addEventListener("keyup", e => {
        if(e.target.matches(".form [required]")){
            const inputsArr = [e.target];
            validarInputs(inputsArr);
        }
    })

    d.addEventListener("click", e=>{
        if(e.target.type === "submit"){
            validarInputs($inputs);
        }
    })

    d.addEventListener("change", e=>{
        if(e.target.matches(".form [required]")){
            const inputsArr = [e.target];
            validarInputs(inputsArr);
        }
    })
}


export const validarInputs = (inputsArray)=>{

    inputsArray.forEach($input=>{
        let pattern = $input.pattern || $input.dataset.pattern
        if(pattern){
            let regex = new RegExp(pattern);
            return !regex.exec($input.value)
            ?d.getElementById($input.name).classList.add("is-active")
            :d.getElementById($input.name).classList.remove("is-active")
        }
    
        if(!pattern){

            if($input.value === "" || $input.value == 'null'){
                return d.getElementById($input.name).classList.add("is-active")
            }else{
                return d.getElementById($input.name).classList.remove("is-active")
            }
        }
    })

}