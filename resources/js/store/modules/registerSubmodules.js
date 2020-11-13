import {USER_ROLES} from "../../data/constants/userRoles";
import adminModule from "./admin/adminModule";
import clientModule from "./client/clientModule";
import supplierModule from "./supplier/supplierModule";

export default {
    actions: {
        appendUserModule({}, {user}) {
            const {context} = getModule(user);

            this.registerModule('userModule', context);
        },

        deleteUserModule() {
            if(this._modules['root']['_children']['userModule']) {
                this.unregisterModule('userModule');
            }
        }
    }
}

function getModule(user) {
    switch (user.role) {
        case USER_ROLES.ADMIN: {
            return {
                moduleName: 'adminModule',
                context: adminModule,
            }
        }
        case USER_ROLES.CLIENT: {
            return {
                moduleName: 'clientModule',
                context: clientModule
            }
        }
        case USER_ROLES.SUPPLIER: {
            return {
                moduleName: 'supplierModule',
                context: supplierModule,
            }
        }
    }
}
