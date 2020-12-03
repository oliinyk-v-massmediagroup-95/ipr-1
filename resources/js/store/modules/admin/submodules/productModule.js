import productApi from "../../../../api/admin/productApi";

export default {

    actions: {
        async adminGetProductsList({getters}) {
            const {data} = await productApi.getProductsList()

            return {
                success: data.success,
                products: data.products,
            }
        },

        async adminShowProduct({getters}, {productId}) {
            const {data} = await productApi.showProduct(productId);

            return {
                success: data.success,
                product: data.product,
                versions: data.versions,
                original: data.original,
                productUser: data.productUser
            }
        },

        async adminBanProduct({getters}, {productId}) {
            const {data} = await productApi.banProduct(productId);

            return {
                success: data.success,
                product: data.product,
            }
        }
    }
}
