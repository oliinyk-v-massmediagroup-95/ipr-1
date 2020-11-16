<template>
    <admin-products-list-page v-if="isUserAdmin" />
    <client-products-list-page v-else-if="isUserClient" />
    <supplier-products-list-page v-else-if="isUserSupplier" />
</template>
<script>
import AdminProductsListPage from '../../components/Admin/Product/ProductsListPage';
import SupplierProductsListPage from '../../components/Supplier/Product/ProductsListPage';
import ClientProductsListPage from '../../components/Client/Product/ProductsListPage';
import { mapGetters } from 'vuex'

export default {
    components: {
        AdminProductsListPage,
        SupplierProductsListPage,
        ClientProductsListPage,
    },
    computed: {
        ...mapGetters([
            'isUserAdmin',
            'isUserSupplier',
            'isUserClient',
        ])
    },
}
</script>
