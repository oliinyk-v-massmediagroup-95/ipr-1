import axios from 'axios';
import store from '../store/store';

function onSuccess(response) {
    return response;
}

function onError(error) {
    const {response} = error;

    if(response.status === 422) {
        store.commit('setServerValidationErrors', response.data.errors);
    }

    return error
}

const axiosInstance = axios.create({
    withCredentials: true,
});

axiosInstance.interceptors.response.use(onSuccess, onError)

export default axiosInstance;
