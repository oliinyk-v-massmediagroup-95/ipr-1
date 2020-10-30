<template>
    <v-app-bar
        color="teal"
        dark
        app
    >
        <v-app-bar-nav-icon @click="sidebarIconClick"></v-app-bar-nav-icon>

        <v-toolbar-title class="float-right">Manage</v-toolbar-title>

        <v-spacer></v-spacer>

        <v-btn icon>
            <v-icon>mdi-dots-vertical</v-icon>
        </v-btn>
    </v-app-bar>
</template>
<script>
export default {
    methods: {
        sidebarIconClick() {
            this.$emit('sidebarIconClick');
        }
    }
}
</script>
