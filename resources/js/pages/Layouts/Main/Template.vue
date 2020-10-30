<template>
    <v-app>
        <main-header @sidebarIconClick="changeSidebar"/>
        <main-sidebar :visible="visible"/>
        <v-main>
            <v-card min-height="100%">
                <slot/>
            </v-card>
        </v-main>

        <!-- Provides the application the proper gutter -->
    </v-app>

</template>
<script>
import MainSidebar from "./Sidebar";
import MainHeader from "./Header";

export default {
    components: {
        MainSidebar,
        MainHeader
    },
    data: () => ({
        visible: true,
    }),
    methods: {
        changeSidebar() {
            return this.visible = !this.visible
        }
    }
}
</script>
