<template>
    <div v-if="loaded">
        <v-row>
            <h3 class="col-10 display-2"> Product Name: {{ product.title }}</h3>
        </v-row>


        <v-card class="mt-16">
            <product-content
                :product="product"
            />
        </v-card>
    </div>
</template>
<script>
import ProductContent from "./ProductShowPage/ProductContent";
import {PRODUCT_STATUS} from "../../../data/constants/productStatuses";

export default {
    components: {ProductContent},
    props: {
        productId: {
            type: Number,
        }
    },
    data: () => ({
        PRODUCT_STATUS,
        product: {},
        loaded: false,
    }),
    async created() {
        await this.getProduct();
    },
    methods: {
        async getProduct() {
            const {product, success} = await this.$store.dispatch('supplierShowProduct', {
                productId: this.productId,
            })

            console.log(success);

            if (success) {
                this.loaded = true;
                this.product = product;
            }
        },
    }
}
</script>
<style>
.section-title {
    font-weight: 700;
    font-size: 26px;
    text-align: center;
}
</style>
