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
                v-for="({text, icon}, i) in items"
                :key="i"
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

export default {
    props: {
        visible: {
            type: Boolean
        }
    },
    data: () => ({
        items: [
            {icon: 'layers', text: 'Products', path: ''},
            {icon: 'supervised_user_circle', text: 'Users', path: ''},
        ],
    }),
}
</script>
