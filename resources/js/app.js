import Vue from 'vue';
import store from './store/store';
import router from './router/router';

import vuetify from './plugins/vuetify'

import AppElement from './App.vue'
Vue.component('AppElement', AppElement);

store.dispatch('checkAuth').then(() => {
    new Vue({
        vuetify,
        store,
        router,
    }).$mount('#app')
})



