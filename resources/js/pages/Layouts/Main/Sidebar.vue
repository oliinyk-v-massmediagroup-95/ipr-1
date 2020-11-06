<template>
    <v-navigation-drawer
        absolute
        dark
        src="https://images.unsplash.com/photo-1557683316-973673baf926?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1915&q=80"
        width="300"
        permanent
        app
        v-if="visible"
    >
        <v-list>
            <v-list-item
                v-for="({text, icon, route}, i) in items"
                :key="i"
                @click="changeRoute(route)"
                link
            >
                <v-list-item-icon>
                    <v-icon>{{ icon }}</v-icon>
                </v-list-item-icon>

                <v-list-item-content>
                    <v-list-item-title>{{ text }}</v-list-item-title>
                </v-list-item-content>
            </v-list-item>
        </v-list>
    </v-navigation-drawer>
</template>
<script>
import {USER_ROLES} from "../../../data/constants/userRoles";

export default {
    props: {
        visible: {
            type: Boolean
        }
    },
    data: () => ({
        items: [
            {icon: 'home', text: 'Dashboard', route: {name: 'dashboard'}},
            {icon: 'layers', text: 'Products', route: {name: 'products'}},
        ],
    }),
    computed: {
        user() {
            return this.$store.getters.getUser
        }
    },
    beforeMount() {
        if(this.user.role === USER_ROLES.ADMIN) {
            this.appendUserSection()
        }
    },
    methods: {
        changeRoute(route) {
            if(this.$router.currentRoute.name !== route.name) {
                this.$router.push(route)
            }
        },

        appendUserSection() {
            this.items.push({admin: true, icon: 'supervised_user_circle', text: 'Users', route: {name: 'users'}});
        }
    }
}
</script>
