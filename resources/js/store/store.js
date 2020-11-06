import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

import UserModule from './modules/userModule';
import ServerValidationModule from './modules/serverValidationModule'

export default new Vuex.Store({
    modules: {
        UserModule,
        ServerValidationModule,
    }
})
