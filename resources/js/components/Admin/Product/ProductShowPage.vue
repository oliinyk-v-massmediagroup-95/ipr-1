<template>
    <div v-if="loaded">
        <v-row>
            <h3 class="col-10 display-2"> Product Name: {{ product.title }}
                <span v-if="!product.isOriginal">(Version)</span>
            </h3>
            <v-btn
                v-if="product.isOriginal"
                :disabled="product.statusName === PRODUCT_STATUS.BANNED"
                depressed
                x-large
                color="error col-2 p-0"
                @click="banProduct(product.id)"
            >
                BAN PRODUCT
            </v-btn>
        </v-row>


        <v-card class="mt-16">
            <product-content
                :product="product"
            />
        </v-card>

        <v-card class="mt-16" width="100%">
            <product-relations
                :versions="product.versions && product.versions.length ? product.versions : null"
                :original="product.original"
            />
        </v-card>
    </div>
</template>
<script>
import ProductContent from "./ProductShowPage/ProductContent";
import ProductRelations from "./ProductShowPage/ProductRelations";
import {PRODUCT_STATUS} from "../../../data/constants/productStatuses";

export default {
    components: {ProductRelations, ProductContent},
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
            const {product, success} = await this.$store.dispatch('adminShowProduct', {
                productId: this.productId,
            })

            if (success) {
                this.loaded = true;
                this.product = product;
            }
        },

        async banProduct(productId) {
            this.loaded = false;
            const {success} = await this.$store.dispatch('adminBanProduct', {
                productId: productId,
            })

            if (success) {
                await this.getProduct()
            }
        }
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
