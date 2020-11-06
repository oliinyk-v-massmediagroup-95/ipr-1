import axios from './../plugins/axios'

export default {

    sanctumCSRF: () => axios.get('/sanctum/csrf-cookie'),

    login: (email, password, rememberMe) => axios.post('/api/login', {
        email,
        password,
        rememberMe
    }),

    checkAuth: () => axios.get('/api/check-auth'),

    logout: () => axios.post('/api/logout')
}
