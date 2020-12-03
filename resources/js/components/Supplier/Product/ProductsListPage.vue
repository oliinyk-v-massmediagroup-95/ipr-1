<template>
    <div>
        <v-row>
            <h3 class="col-10 display-2">Products</h3>

            <v-btn
                depressed
                x-large
                class="col-2 primary p-0"
                @click="createProductPage"
            >
                Create Product
            </v-btn>
        </v-row>


        <v-card class="mt-16" width="100%">
            <v-simple-table>
                <template v-slot:default>
                    <thead>
                    <tr>
                        <th class="text-center">
                            ID
                        </th>
                        <th class="text-center">
                            Title
                        </th>
                        <th class="text-center">
                            Image
                        </th>
                        <th class="text-center">
                            Status
                        </th>
                        <th class="text-center">
                            Cost
                        </th>
                        <th class="text-center">
                            Weight
                        </th>
                        <th class="text-center">
                            Sizes
                        </th>
                        <th class="text-center">
                            Created At
                        </th>
                        <th class="text-center">
                            Operations
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr
                        v-for="(product, index) in products"
                        :key="product.id"
                    >
                        <td class="text-center">{{ '#' + (index + 1) }}</td>
                        <td class="text-center">{{ product.title }}</td>
                        <td class="text-center">
                            <img :src="product.img" width="100" :alt="product.title">
                        </td>
                        <td class="text-center">{{ product.statusName }}</td>
                        <td class="text-center">{{ product.cost }}</td>
                        <td class="text-center">{{ product.weight }}</td>
                        <td class="text-center">{{ product.sizes }}</td>
                        <td class="text-center">{{ product.createdAt }}</td>
                        <td class="text-center">
                            <v-btn
                                small
                                class="primary"
                                color="blue"
                                @click="showProductPage(product.id)"
                            >
                                show
                            </v-btn>
                            <v-btn
                                small
                                :disabled="isEditProductDisabled(product)"
                                class="primary"
                                color="success"
                                @click="editProductPage(product.id)"
                            >
                                edit
                            </v-btn>
                            <v-btn
                                small
                                :disabled="isDeleteProductDisabled(product)"
                                class="primary"
                                color="error"
                                @click="deleteProduct(product.id)"
                            >
                                delete
                            </v-btn>
                        </td>
                    </tr>
                    </tbody>
                </template>
            </v-simple-table>
        </v-card>
    </div>
</template>
<script>
import {PRODUCT_STATUS} from "../../../data/constants/productStatuses";
import {notFoundImage} from "../../../data/constants/shared";
import Product from "../../../model/product";

export default {
    async created() {
        await this.getProducts();
    },
    data: () => ({
        PRODUCT_STATUS,
        notFoundImage,
        products: [],
    }),
    methods: {
        async getProducts() {
            const {success, products} = await this.$store.dispatch('supplierGetProductsList');

            if (success) {
                this.products = Product.transformCollection(products);
            }
        },

        createProductPage() {
            this.$router.push({name: 'products-create'});
        },

        isEditProductDisabled(product) {
            return product.statusName === PRODUCT_STATUS.BANNED
        },

        isDeleteProductDisabled(product) {
            return product.statusName === PRODUCT_STATUS.BANNED
        },

        showProductPage(productId) {
            this.$router.push({name: 'products-show', params: {productId: productId}})
        },

        editProductPage(productId) {
            this.$router.push({name: 'products-edit', params: {productId: productId}})
        },

        async deleteProduct(productId) {
            const {success} = await this.$store.dispatch('supplierDeleteProduct', {
                productId: productId,
            });

            if (success) {
                await this.getProducts()
            }
        },
    }
}
</script>
