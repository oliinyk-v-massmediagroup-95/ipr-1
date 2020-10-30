import Vue from 'vue';

import vuetify from './plugins/vuetify'

import App from './App'
Vue.component('AppElement', App);

new Vue({
    vuetify,
}).$mount('#app')


