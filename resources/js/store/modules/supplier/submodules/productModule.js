import productApi from "../../../../api/supplier/productApi";

export default {

    actions: {
        async supplierGetProductsList({getters}) {
            const {data} = await productApi.getProductsList()
            // console.log(data);
            return {
                success: data.success,
                products: data.products,
            }
        },

        async supplierShowProduct({getters}, {productId}) {
            const {data} = await productApi.showProduct(productId);

            return {
                success: data.success,
                product: data.product,
            }
        },

        async supplierCreateProduct({getters}, {productData}) {
            const {data} = await productApi.createProduct(productData);

            return {
                success: data.success,
            }
        },

        async supplierEditProduct({getters}, {productId}) {
            const {data} = await productApi.editProduct(productId)

            return {
                success: data.success,
                product: data.product,
            }
        },

        async supplierUpdateProduct({getters}, {productId, productData}) {
            const {data} = await productApi.updateProduct(productId, productData);

            return {
                success: data.success,
            }
        },

        async supplierDeleteProduct({getters}, {productId}) {
            const {data} = await productApi.deleteProduct(productId);

            return {
                success: data.success,
            }
        }
    }
}
