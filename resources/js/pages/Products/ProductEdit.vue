<template>
    <supplier-edit-page
        v-if="isUserSupplier"
        :product-id="productId"
    />
</template>
<script>
import SupplierEditPage from '../../components/Supplier/Product/ProductEditPage'
import {mapGetters} from 'vuex'

export default {
    props: {
        productId: {
            type: Number
        }
    },
    components: {
        SupplierEditPage
    },
    computed: {
        ...mapGetters(['isUserSupplier'])
    }
}
</script>
