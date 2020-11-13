import axios from './../../plugins/axios'

export default {

    getProductsList: () => axios.get('/api/admin/products'),

    showProduct: (productId) => axios.get(`/api/admin/products/${productId}`),

    banProduct: (productId) => axios.post(`/api/admin/products/${productId}/ban`),
}
