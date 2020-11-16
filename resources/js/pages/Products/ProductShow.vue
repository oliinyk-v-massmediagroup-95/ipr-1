<template>
    <admin-product-show-page
        v-if="isUserAdmin"
        :productId="productId"
    />
    <supplier-product-show-page
        v-else-if="isUserSupplier"
        :product-id="productId"
    />
</template>
<script>
import AdminProductShowPage from '../../components/Admin/Product/ProductShowPage'
import SupplierProductShowPage from '../../components/Supplier/Product/ProductShowPage'

import {mapGetters} from 'vuex'

export default {
    components: {
        AdminProductShowPage,
        SupplierProductShowPage,
    },
    props: {
        productId: {
            type: Number,
        }
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
