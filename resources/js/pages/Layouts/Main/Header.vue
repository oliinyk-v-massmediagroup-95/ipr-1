<template>
    <v-app-bar
        color="teal"
        dark
        app
    >
        <v-app-bar-nav-icon @click="sidebarIconClick"></v-app-bar-nav-icon>

        <v-spacer></v-spacer>

        <v-menu
            v-model="menu"
            :close-on-content-click="false"
            :nudge-width="200"
            offset-x
        >
            <template v-slot:activator="{ on, attrs }">
                <v-btn
                    v-bind="attrs"
                    v-on="on"
                    icon
                >
                    <v-icon>mdi-dots-vertical</v-icon>
                </v-btn>
            </template>
            <v-card>
                <v-list>
                    <v-list-item>
                        <v-list-item-avatar>
                            <img
                                src="https://www.clipartmax.com/png/full/171-1717870_stockvader-predicted-cron-for-may-user-profile-icon-png.png"
                                alt="user-image"
                            >
                        </v-list-item-avatar>

                        <v-list-item-content>
                            <v-list-item-title>{{ user.name }}</v-list-item-title>
                            <v-list-item-subtitle>{{ user.role }}</v-list-item-subtitle>
                        </v-list-item-content>

                        <v-list-item-action>
                            <v-list-item-title class="pointer pr-8" @click="userLogout">Logout</v-list-item-title>
                        </v-list-item-action>
                    </v-list-item>
                </v-list>
            </v-card>
        </v-menu>
    </v-app-bar>
</template>
<script>
export default {
    data: () => ({
        menu: false,
    }),
    computed: {
        user() {
            return this.$store.getters.getUser;
        },
    },
    methods: {
        sidebarIconClick() {
            this.$emit('sidebarIconClick');
        },

        async userLogout() {
            const {success} = await this.$store.dispatch('logout');

            if(!success) {
                await this.$router.push({name: 'login'})
            }
        }
    }
}
</script>
<style scoped>
.pointer {
    cursor: pointer;
}

.pointer:hover {
    color: blue;
    text-decoration-line: underline;
}
</style>
