import userApi from "../../api/userApi";

export default {
    state: {
        user: null,
        isAuth: false,
    },

    getters: {
        isUserAuth: (state) => state.isAuth,
        getUser: (state) => state.user,
    },

    mutations: {
        setUser: (state, data) => state.user = data,
        setAuthFalse: (state) => state.isAuth = false,
        setAuthTrue: (state) => state.isAuth = true,
    },

    actions: {
        async login({dispatch}, {email, password, rememberMe}) {
            await userApi.sanctumCSRF();
            await userApi.login(email, password, rememberMe);

            return await dispatch('checkAuth');
        },

        async logout({dispatch}) {
            await userApi.logout();

            return await dispatch('checkAuth');
        },

        async checkAuth({commit}) {
            const {data} = await userApi.checkAuth();

            if (data.success) {
                commit('setUser', data.user);
                commit('setAuthTrue');
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
