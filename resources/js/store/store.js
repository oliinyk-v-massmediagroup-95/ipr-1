import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

import AuthModule from './modules/authModule';
import ServerValidationModule from './modules/serverValidationModule';
import AdminModule from './modules/admin/adminModule';
import ClientModule from './modules/client/clientModule';
import SupplierModule from './modules/supplier/supplierModule';


export default new Vuex.Store({
    modules: {
        AuthModule,
        ServerValidationModule,
        AdminModule,
        ClientModule,
        SupplierModule,
    },
})
