import Vue from 'vue';

import vuetify from './plugins/vuetify'

import AppElement from './App.vue'
Vue.component('AppElement', AppElement);

new Vue({
    vuetify,
}).$mount('#app')


