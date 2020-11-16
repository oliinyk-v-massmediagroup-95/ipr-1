<template>
    <component :is="getTemplate">
        <router-view :key="$route.fullPath" />
    </component>
</template>
<script>
import MainTemplate from './pages/Layouts/Main/Template'
import GuestTemplate from './pages/Layouts/Guest/Template'

export default {
    components: {
        MainTemplate,
        GuestTemplate,
    },
    computed: {
        isUserAuth() {
            return this.$store.getters.isUserAuth;
        },

        getTemplate() {
            if(this.isUserAuth) {
                return 'main-template'
            }

            return 'guest-template'
        }
    },
}
</script>
