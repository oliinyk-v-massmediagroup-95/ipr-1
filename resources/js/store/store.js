import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

import AuthModule from './modules/authModule';
import ServerValidationModule from './modules/serverValidationModule';
import RegisterSubmodules from './modules/registerSubmodules'

export default new Vuex.Store({
    modules: {
        RegisterSubmodules,
        AuthModule,
        ServerValidationModule,
    },
})
