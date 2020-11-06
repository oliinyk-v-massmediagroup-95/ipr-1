<template>
    <div>
        <h3 class="display-2">Users</h3>

        <v-card class="mt-16" width="90%">
            <v-simple-table>
                <template v-slot:default>
                    <thead>
                    <tr>
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
                        v-for="user in users"
                        :key="user.name"
                    >
                        <td>{{ item.name }}</td>
                        <td>{{ item.calories }}</td>
                        <td>{{ item.name }}</td>
                        <td>{{ item.calories }}</td>
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
}
</script>
