<template>
    <div class="pt-4">
        <p class="section-title">Content</p>

        <v-divider/>

        <v-row class="pb-4">
            <v-col class="px-8 py-4" cols="6">
                <div class="product-content justify-center">
                    <v-row
                        v-for="(option, index) in transformProductData()"
                        :key="index"
                        class="mt-6 text-center"
                        no-gutters>
                        <v-col cols="12" sm="6">
                            <v-card class="pa-2" outlined tile>
                                {{ option.key }}
                            </v-card>
                        </v-col>
                        <v-col cols="12" sm="6">
                            <v-card class="pa-2" outlined tile>
                                <span v-html="option.data"></span>
                            </v-card>
                        </v-col>
                    </v-row>
                </div>

            </v-col>

            <v-col class="pt-10 px-8 text-center" cols="6">
                <img v-if="product.img" :src="product.img" :alt="product.title">
                <img v-else src="https://www.thermaxglobal.com/wp-content/uploads/2020/05/image-not-found.jpg"
                     alt="not found">
            </v-col>
        </v-row>
    </div>
</template>
<script>
export default {
    props: {
        product: {
            type: Object,
            required: true,
        }
    },
    methods: {
        transformProductData() {
            return [
                {key: 'Name', data: this.product.title},
                {key: 'Cost', data: this.product.cost},
                {key: 'Weight', data: this.product.weight},
                {key: 'Sizes', data: this.product.sizes},
                {key: 'User Name', data: this.product.userName},
                {key: 'Product Status', data: `<b>${this.product.statusName}</b>`},
            ];
        }
    }
}
</script>
<style scoped>
img {
    border-radius: 7.5px;
    max-height: 370px;
    object-fit: scale-down;
    width: auto;
    max-width: 100%;
}
</style>
