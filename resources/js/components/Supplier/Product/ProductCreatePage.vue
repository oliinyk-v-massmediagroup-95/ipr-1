<template>
    <div>
        <v-row>
            <h3 class="col-10 display-2">Create Product</h3>
        </v-row>

        <v-card class="mt-16 col">
            <v-container>
                <product-form
                    button-text="Create Product"
                    @submit="createProduct"
                />
            </v-container>
        </v-card>
    </div>
</template>
<script>
import ProductForm from './ProductCreatePage/ProductForm'

export default {
    components: {
        ProductForm,
    },
    methods: {
        async createProduct(productData) {
            const {success} = await this.$store.dispatch('supplierCreateProduct', {
                productData: productData
            })

            if (success) {
                await this.$router.push({name: 'products'})
            }
        },
    },
}
</script>
