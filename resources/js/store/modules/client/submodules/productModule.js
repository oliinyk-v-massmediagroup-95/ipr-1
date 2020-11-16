import productApi from "../../../../api/client/productApi";

export default {
    actions: {
        async clientGetProductsList({getters}) {
            const {data} = await productApi.getProductsList()

            return {
                success: data.success,
                products: data.products,
            }
        },

        async clientShowProduct({getters}, {productId}) {
            const {data} = await productApi.showProduct(productId);

            return {
                success: data.success,
                product: data.product,
            }
        },

        async clientConfirmProduct({getters}, {productId}) {
            const {data} = await productApi.confirmProduct(productId);

            return {
                success: data.success,
                product: data.product,
            }
        }
    }
}
