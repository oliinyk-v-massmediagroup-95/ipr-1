import axios from './../../plugins/axios'

export default {

    getProductsList: () => axios.get('/api/client/products'),

    showProduct: (productId) => axios.get(`/api/client/products/${productId}`),

    confirmProduct: (productId) => axios.post(`/api/client/products/${productId}/confirm`),
}
