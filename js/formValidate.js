const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const expresiones = {
	/* usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo */
	/* password: /^.{4,12}$/, // 4 a 12 digitos. */
	name: /^[a-zA-ZÀ-ÿ\s]{1,40}$/,// Letras y espacios, pueden llevar acentos.
	lastName: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	email: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	phone: /^\d{7,14}$/, // 7 a 14 numeros.
}

const campos = {
		name: false,
		lastName: false,
		email: false,
		phone: false
}

const validarFormulario = (e) => {
	switch (e.target.name) {
		case "name":
				validarCampo(expresiones.nombre, e.target, 'name');
		break;

		case "lastName":
				validarCampo(expresiones.correo, e.target, 'lastName');
		break;

		case "email":
				validarCampo(expresiones.correo, e.target, 'email');
		break;

		case "phone":
				validarCampo(expresiones.telefono, e.target, 'phone');
		break;

		default:

	}
}

const validarCampo = (expresion, input, campo) => {
	if (expresion.test(input.value)) {
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-circle-xmark');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-circle-check');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-active')
		campos[campo] = true;
	}else {
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-circle-xmark');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-circle-check');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-active')
		campos[campo] = false;
	}
}

inputs.forEach((input) => {
	input.addEventListener('keyup', validarFormulario);
	input.addEventListener('blur', validarFormulario);
});

formulario.addEventListener('submit', (e) => {

	const terminos = document.getElementById('terminos');
	if (campos.name && campos.email && campos.phone && terminos.checked) {


		document.getElementById('formulario__mensaje-exito').classList.add('formulario__mensaje-exito-active');
		setTimeout(() => {
			document.getElementById('formulario__mensaje-exito').classList.remove('formulario__mensaje-exito-active');
		}, 5000);

		document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
			icono.classList.remove('formulario__grupo-correcto');
		});
	}else {
		document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-active');
		setTimeout(() => {
			document.getElementById('formulario__mensaje').classList.remove('formulario__mensaje-active');
		}, 5000);

		document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
			icono.classList.remove('formulario__grupo-correcto');
		});

		e.preventDefault();
	}
});
