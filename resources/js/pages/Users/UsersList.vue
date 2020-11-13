<template>
    <div>
        <h3 class="display-2">Users</h3>

        <v-card class="mt-16" width="100%">
            <v-simple-table>
                <template v-slot:default>
                    <thead>
                    <tr>
                        <th class="text-left">
                            ID
                        </th>
                        <th class="text-left">
                            Name
                        </th>
                        <th class="text-left">
                            Role
                        </th>
                        <th class="text-left">
                            Email
                        </th>
                        <th class="text-left">
                            Created At
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr
                        v-for="(user, index) in users"
                        :key="user.id"
                    >
                        <td>{{ '#'+(index+1) }}</td>
                        <td>{{ user.name }}</td>
                        <td>{{ user.role }}</td>
                        <td>{{ user.email }}</td>
                        <td>{{ user.createdAt }}</td>
                    </tr>
                    </tbody>
                </template>
            </v-simple-table>
        </v-card>
    </div>
</template>
<script>
export default {
    data: () => ({
        users: [],
    }),
    async created() {
        await this.getUsers();
    },
    methods: {
        async getUsers() {
            const {users, success} = await this.$store.dispatch('getUsersList')

            if(success) {
                this.users = users;
            }
        }
    }
}
</script>
