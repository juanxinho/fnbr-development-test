import axios from "axios";

export const authService = axios.create({
    baseURL: window.location.origin + '/api',
});
