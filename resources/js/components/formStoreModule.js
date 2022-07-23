// Importación del api
import * as API from "@/services/api.service";

export default {
    namespaced: true,
    state: {},
    getters: {},
    mutations: {},
    actions: {
        // Metodo del api de areas
        getAreas() {
            return new Promise((resolve, reject) => {
                API.authService
                    .get(`/areas`)
                    .then((response) => resolve(response))
                    .catch((error) => reject(error));
            });
        },
        // Metodo del api de programas
        getPrograms() {
            return new Promise((resolve, reject) => {
                API.authService
                    .get(`/programs`)
                    .then((response) => resolve(response))
                    .catch((error) => reject(error));
            });
        },
        // Metodo para guardar el api de los formularios
        create(ctx, objData) {
            const requestOptions = {
                "Content-Type": "application/json",
            };
            return new Promise((resolve, reject) => {
                API.authService
                    .post(`/form/store`, objData, requestOptions)
                    .then((response) => resolve(response))
                    .catch((errors) => reject(errors));
            });
        },
    },
};
