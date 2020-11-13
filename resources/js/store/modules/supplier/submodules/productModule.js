import productApi from "../../../../api/supplier/productApi";

export default {

    actions: {
        async getProductsList({getters}) {
            const {data} = await productApi.getProductsList()

            return {
                success: data.success,
                products: data.products,
            }
        },

        async showProduct({getters}, {productId}) {
            const {data} = await productApi.showProduct(productId);

            return {
                success: data.success,
                product: data.product,
            }
        },

        async createProduct({getters}, {productData}) {
            const {data} = await productApi.createProduct(productData);

            return {
                success: data.success,
            }
        },

        async editProduct({getters}, {productId}) {
            const {data} = await productApi.editProduct(productId)

            return {
                success: data.success,
                product: data.product,
            }
        },

        async updateProduct({getters}, {productId, productData}) {
            const {data} = await productApi.updateProduct(productId, productData);

            return {
                success: data.success,
            }
        },

        async deleteProduct({getters}, {productId}) {
            const {data} = await productApi.deleteProduct(productId);

            return {
                success: data.success,
            }
        }
    }
}
