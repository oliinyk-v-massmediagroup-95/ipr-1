<template>
    <component :is="getContentByRole" :products="products" />
</template>
<script>
import AdminProducts from '../../components/Admin/ProductList/AdminProducts';
import SupplierProducts from '../../components/Supplier/ProductList/SupplierProducts';
import ClientProducts from '../../components/Client/ProductList/ClientProducts';

export default {
    components: {
        AdminProducts,
        SupplierProducts,
        ClientProducts,
    },
    data: () => ({
        products: [],
    }),
    computed: {
        userRole() {
            return this.$store.getters.getUserRole;
        },
        getContentByRole() {
            return this.userRole + '-products';
        }
    },
    async created() {
        await this.getProducts();
    },
    methods: {
        async getProducts() {
            const {success, products} = await this.$store.dispatch('getProductsList');

            if(success) {
                this.products = products;
            }
        }
    }
}
</script>
