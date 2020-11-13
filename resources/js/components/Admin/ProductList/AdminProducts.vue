<template>
    <div>
        <h3 class="display-2">Products</h3>

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
                            User Name
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
                        <td class="text-center">{{ product.userName }}</td>
                        <td class="text-center">{{ product.statusName }}</td>
                        <td class="text-center">{{ product.cost }}</td>
                        <td class="text-center">{{ product.weight }}</td>
                        <td class="text-center">{{ product.sizes }}</td>
                        <td class="text-center">{{ product.createdAt }}</td>
                        <td class="text-center">
                            <v-btn
                                class="ma-2"
                                text
                                icon
                                color="blue"
                            >
                                <v-icon>remove_red_eye</v-icon>
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

export default {
    props: {
        products: {
            type: Array,
        }
    }
}
</script>
