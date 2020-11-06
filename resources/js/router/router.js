import Vue from 'vue';
import VueRouter from 'vue-router'
import Login from "../pages/Auth/Login";
import Dashboard from "../pages/Dashboard";
import {Auth, Guest} from "./middleware/auth";
import ProductList from "../pages/Products/ProductList";
import UsersList from "../pages/Users/UsersList";

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/login',
            name: 'login',
            component: Login,
            meta: {
                middleware: [Guest]
            }
        },
        {
            path: '/',
            name: 'dashboard',
            component: Dashboard,
            meta: {
                middleware: [Auth]
            }
        },
        {
            path: '/products',
            name: 'products',
            component: ProductList,
            meta: {
                middleware: [Auth]
            }
        },

        {
            path: '/users',
            name: 'users',
            component: UsersList,
            meta: {
                middleware: [Auth]
            }
        },

        {
            path: '*',
            redirect: {name: 'dashboard'}
        }
    ],
});

router.beforeEach(async (to, from, next) => {
    if (to.meta.middleware) {
        return to.meta.middleware[0]({
            router,
            next,
        });
    }

    return next();
});

export default router;
