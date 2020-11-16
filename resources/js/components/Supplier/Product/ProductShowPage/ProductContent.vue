<template>
    <product-content :product="product" />
</template>
<script>
import ProductContent from '../../../Admin/Product/ProductShowPage/ProductContent'

export default {
    components: {
        ProductContent
    },
    props: {
        product: {
            type: Object,
            required: true,
        }
    }
}
</script>
