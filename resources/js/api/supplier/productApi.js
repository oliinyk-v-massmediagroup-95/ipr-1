import axios from './../../plugins/axios'

export default {

    getProductsList: () => axios.get('/api/supplier/products'),

    showProduct: (productId) => axios.get(`/api/supplier/products/show/${productId}`),

    createProduct: (data) => axios.post(`/api/supplier/products/create`, data),

    editProduct: (productId) => axios.get(`/api/supplier/products/edit/${productId}`),

    updateProduct: (productId, data) => axios.post(`/api/supplier/products/update/${productId}`, data),

    deleteProduct: (productId) => axios.post(`/api/supplier/products/delete/${productId}`)
}
