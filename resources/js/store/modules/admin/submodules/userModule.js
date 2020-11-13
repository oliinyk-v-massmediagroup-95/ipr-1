import userApi from "../../../../api/admin/userApi";

export default {
    actions: {

        async getUsersList() {
            const {data} = await userApi.getUsersList()

            return {
                success: data.success,
                users: data.users,
            }
        }
    }
}
