import Vue from 'vue';
import VueRouter from 'vue-router'
import Login from "../pages/Auth/Login";

const router = new VueRouter({
    mode: 'history',
    paths: {
        path: '/login',
        name: 'login',
        component: Login
    }
})

export default router;
