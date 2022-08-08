const inputs = document.querySelectorAll('#form input');

const expresiones = {
    name: /^[a-zA-ZÀ-ÿ\s]{1,40}$/,
    lastname: /^[a-zA-ZÀ-ÿ\s]{1,40}$/,
    email: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    phone: /^\d{7,10}$/
}

const campos = {
    name: false,
    lastname: false,
    email: false,
    phone: false
}

const validarform = (e) => {
    switch (e.target.name) {
        case "name":
            valCampo(expresiones.name, e.target, 'name');
            break;
        case "lastname":
            valCampo(expresiones.lastname, e.target, 'lastname');
            break;
        case "email":
            valCampo(expresiones.email, e.target, 'email');
            break;
        case "phone":
            valCampo(expresiones.phone, e.target, 'phone');
            break;
    }
}

const valCampo = (expresion, input, campo) => {
    if (expresion.test(input.value)) {
        document.getElementById(`group__${campo}`).classList.remove('form__group-incorrect');
        document.getElementById(`group__${campo}`).classList.add('form__group-correct');
        document.querySelector(`#group__${campo} i`).classList.add('fa-check-circle');
        document.querySelector(`#group__${campo} i`).classList.remove('fa-times-circle');
        document.querySelector(`#group__${campo} .form__input-error`).classList.remove('form__input-error-active');
        campos[campo] = true;
    } else {
        document.getElementById(`group__${campo}`).classList.add('form__group-incorrect');
        document.getElementById(`group__${campo}`).classList.remove('form__group-correct');
        document.querySelector(`#group__${campo} i`).classList.add('fa-times-circle');
        document.querySelector(`#group__${campo} i`).classList.remove('fa-check-circle');
        document.querySelector(`#group__${campo} .form__input-error`).classList.add('form__input-error-active');
        campos[campo] = false;
    }
}

inputs.forEach((input) => {
    input.addEventListener('keyup', validarform);
    input.addEventListener('blur', validarform);
});