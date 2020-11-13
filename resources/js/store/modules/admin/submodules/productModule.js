import productApi from "../../../../api/admin/productApi";

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

        async banProduct({getters}, {productId}) {
            const {data} = await productApi.banProduct(productId);

            return {
                success: data.success,
                product: data.product,
            }
        }
    }
}
