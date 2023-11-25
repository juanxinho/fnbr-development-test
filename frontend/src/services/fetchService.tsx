import axios from 'axios';

export const fetchService = async (url: string, options: any) => {
    return await axios(url, options).then((response) => {
        return response.data;
    }).catch((error) => {
        return error;
    });
};
export const fetchServiceAPI = async (url: string, options: any) => {
    const urlAPI = process.env.REACT_APP_API_URL + url;
    return await axios(urlAPI, options).then((response) => {
        return response;
    }).catch((error) => {
        return error;
    });
}