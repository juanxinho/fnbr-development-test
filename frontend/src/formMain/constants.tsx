import * as Yup from "yup";


export const AreasPrograms = [
    {

        area: "Departamento de Medio Ambiente y Sostenibilidad",
        programs: ["Máster Universitario en Gestión y Auditorías Ambientales"],
    },
    {
        area: "Departamento de Innovación, Empresa y Nuevas Tecnologías",
        programs: [
            "Maestría en Dirección Estratégica con Especialización en Gestión",
            "Maestría en Gestión Estratégica con Especialización en Tecnologías de la Información",
            "Maestría en Dirección Estratégica con especialización en Telecomunicaciones",
        ],
    },
    {
        area: "Departamento de Ciencias de la Salud",
        programs: [
            "Máster Universitario en Actividad Física: Entrenamiento y Gestión Deportiva",
            "Maestría en Ciencias Naturopáticas",
        ],
    },
    {
        area: "Departamento de Proyectos",
        programs: [
            "Máster Universitario en Diseño, Gestión y Dirección de Proyectos",
            "Maestría en Diseño, Gestión y Gestión de Proyectos con especialización en Innovación y Productos",
            "Maestría en Diseño, Gestión y Gestión de Proyectos con especialización en Arquitectura y Urbanismo",
        ],
    },
];

export const InformationRequestSchema = Yup.object().shape({
    knowledgeAreas: Yup.string().required("Requerido"),
    program: Yup.string().required("Requerido"),
    names: Yup.string().required("Requerido"),
    lastNames: Yup.string().required("Requerido"),
    email: Yup.string().email("Invalid email").required("Requerido"),
    phone: Yup.string()
        .matches(/^[0-9]+$/, "Debe solo tener digitos")
        .min(6, "Too Short!")
        .max(20, "Too Long!")
        .required("Requerido"),
    countryOfResidence: Yup.object().shape({
        id: Yup.number().required("Requerido"),
        name: Yup.string().required("Requerido"),
        iso2: Yup.string().required("Requerido"),
    }).required("Requerido"),
    state: Yup.object().shape({
        id: Yup.number(),
        name: Yup.string(),
        iso2: Yup.string(),
    }),
    city: Yup.object().shape({
        id: Yup.number(),
        name: Yup.string(),
        iso2: Yup.string(),
    }),
    comments: Yup.string(),
    acceptPrivacyPolicy: Yup.bool().oneOf([true], "You must accept the privacy policy"),
});

export interface CountryInterface {
    id: number;
    name: string;
    iso2?: string;
};

export interface InformationForm {
    knowledgeAreas: string;
    program: string;
    names: string;
    lastNames: string;
    email: string;
    phone: string;
    countryOfResidence: CountryInterface;
    state: CountryInterface;
    city: CountryInterface;
    comments?: string;
    acceptPrivacyPolicy: boolean;
}
export const initValues: InformationForm = {
    knowledgeAreas: "",
    program: "",
    names: "",
    lastNames: "",
    email: "",
    phone: "",
    countryOfResidence: {
        id: 0,
        name: "",
        iso2: "",
    },
    state: {
        id: 0,
        name: "",
        iso2: "",
    },
    city: {
        id: 0,
        name: "",
        iso2: "",

    },
    comments: "",
    acceptPrivacyPolicy: false,
};