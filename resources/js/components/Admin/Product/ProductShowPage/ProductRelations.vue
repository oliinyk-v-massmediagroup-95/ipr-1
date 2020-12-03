<template>
    <v-row>
        <v-col class="px-8 py-4" cols="6" v-if="versions">
            <p class="section-title">Versions</p>

            <v-simple-table>
                <template v-slot:default>
                    <thead>
                    <tr>
                        <th class="text-center">
                            ID
                        </th>
                        <th class="text-center">
                            Status
                        </th>
                        <th class="text-center">
                            Operations
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr
                        v-for="(product, index) in versions"
                        :key="product.id"
                    >
                        <td class="text-center">{{ 'Version #' + (index + 1) }}</td>
                        <td class="text-center">
                            <b>{{ product.statusName }}</b>
                        </td>
                        <td class="text-center">
                            <v-btn
                                small
                                class="primary"
                                color="blue"
                                @click="showProduct(product.id)"
                            >
                                show
                            </v-btn>
                        </td>
                    </tr>
                    </tbody>
                </template>
            </v-simple-table>
        </v-col>

        <v-col class="px-8 py-4" cols="6" v-if="original">
            <p class="section-title">Original</p>

            <v-simple-table>
                <template v-slot:default>
                    <thead>
                    <tr>
                        <th class="text-center">
                            Status
                        </th>
                        <th class="text-center">
                            Operations
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="text-center">
                            <b>{{ original.statusName }}</b>
                        </td>
                        <td class="text-center">
                            <v-btn
                                small
                                class="primary"
                                color="blue"
                                @click="showProduct(original.id)"
                            >
                                show
                            </v-btn>
                        </td>
                    </tr>
                    </tbody>
                </template>
            </v-simple-table>
        </v-col>
    </v-row>
</template>
<script>

export default {
    props: {
        versions: {
            type: Array,
            default: null,
        },
        original: {
            type: Object,
            default: null,
        }
    },
    mounted() {
        console.log(this.versions)
    },
    methods: {
        async showProduct(productId) {
            await this.$router.push({name: 'products-show', params: {productId: productId}}).catch(() => {});
        }
    }
}
</script>
