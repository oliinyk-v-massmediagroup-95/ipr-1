<template>
    <admin-user-list-page v-if="isUserAdmin" />
</template>
<script>
import AdminUserListPage from "../../components/Admin/User/UserListPage";
import {mapGetters} from "vuex";

export default {
    components: {
        AdminUserListPage
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
