<template>
    <div>
        <v-row>
            <h3 class="col-10 display-2">Create Product</h3>

            <v-btn
                depressed
                x-large
                class="col-2 primary"
                @click="createProduct"
            >
                Create
            </v-btn>
        </v-row>


        <v-card class="mt-16">
            <v-container>
                <product-form
                    :product="{}"
                    @submit="updateProduct"
                />
            </v-container>
        </v-card>
    </div>
</template>
<script>
import ProductForm from './ProductCreatePage/ProductForm'

export default {
    components: {
        ProductForm
    },
    methods: {
        updateProduct() {

        }
    }
}
</script>
