<template>
    <div>
        <v-row>
            <h3 class="col-10 display-2">Edit Product</h3>
        </v-row>

        <v-card class="mt-16 col">
            <v-container>
                <product-form
                    button-text="Update Product"
                    v-if="product"
                    :product="product"
                    @submit="updateProduct"
                />
            </v-container>
        </v-card>
    </div>
</template>
<script>
import ProductForm from './ProductCreatePage/ProductForm'

export default {
    props: {
        productId: {
            type: Number,
        }
    },
    data: () => ({
        product: null,
    }),
    components: {
        ProductForm
    },
    async created() {
        await this.getProduct()
    },
    methods: {
        async getProduct() {
            const {success, product} = await this.$store.dispatch('supplierEditProduct', {
                productId: this.productId
            })

            if(success) {
                this.product = product;
            }
        },

        async updateProduct(productData) {
            const {success} = await this.$store.dispatch('supplierUpdateProduct', {
                productId: this.productId,
                productData: productData
            });

            if(success) {
                await this.$router.push({name: 'products'})
            }
        }
    }
}
</script>
