<template>
    <supplier-create-page v-if="isUserSupplier" />
</template>
<script>
import SupplierCreatePage from '../../components/Supplier/Product/ProductCreatePage'
import {mapGetters} from 'vuex'

export default {
    components: {
        SupplierCreatePage
    },
    computed: {
        ...mapGetters(['isUserSupplier'])
    }
}
</script>
