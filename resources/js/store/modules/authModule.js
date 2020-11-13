import authApi from "../../api/authApi";
import {USER_ROLES} from "../../data/constants/userRoles";

export default {
    state: {
        user: null,
        isAuth: false,
    },

    getters: {
        isUserAuth: (state) => state.isAuth,
        getUser: (state) => state.user,
        getUserRole: (state) => state.user.role,

        isUserAdmin: (state) => state.user.role === USER_ROLES.ADMIN,
        isUserSupplier: (state) => state.user.role === USER_ROLES.SUPPLIER,
        isUserClient: (state) => state.user.role = USER_ROLES.CLIENT
    },

    mutations: {
        setUser: (state, data) => state.user = data,
        setAuthFalse: (state) => state.isAuth = false,
        setAuthTrue: (state) => state.isAuth = true,
    },

    actions: {
        async login({dispatch}, {email, password, rememberMe}) {
            await authApi.sanctumCSRF();
            await authApi.login(email, password, rememberMe);

            return await dispatch('checkAuth');
        },

        async logout({dispatch}) {
            await authApi.logout();

            return await dispatch('checkAuth');
        },

        async checkAuth({commit, dispatch}) {
            const {data} = await authApi.checkAuth();

            if (data.success) {
                commit('setUser', data.user);
                commit('setAuthTrue');

                await dispatch('deleteUserModule');
                await dispatch('appendUserModule', {user: data.user})
            }else {
                commit('setUser', null);
                commit('setAuthFalse');
            }

            return {
                success: data.success,
            }
        }
    }
}
