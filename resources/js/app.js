/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vuetify from 'vuetify';
import VueRouter from 'vue-router';
import VueSweetalert2 from 'vue-sweetalert2'
import 'sweetalert2/dist/sweetalert2.min.css';
import VueBootstrapToasts from "vue-bootstrap-toasts";

Vue.use(VueBootstrapToasts);
Vue.use(VueSweetalert2);
Vue.use(VueRouter);
Vue.use(Vuetify);

import Dashboard from './components/admin/Dashboard.vue'
import Users from './components/admin/Users.vue'
import Account from './components/admin/Account.vue'
import Profile from './components/admin/Profile.vue'
import Product from './components/admin/Product.vue'
import Medidas from './components/admin/Medidas.vue'
import Discount from './components/admin/Discount.vue'
import Masivos from './components/admin/Masivos.vue'

const router = new VueRouter ({
    mode : 'history',
    routes : [

        {
            path : '/admin/dashboard',
            component : Dashboard,
            name : 'dashboard'
        },

        {
            path: '/admin/users',
            component: Users,
            name: 'users'
        },
        {
            path: '/admin/account',
            component: Account,
            name: 'account'
        },
        {
            path: '/admin/profile',
            component: Profile,
            name: 'profile'
        },
        {
            path: '/admin/product',
            component: Product,
            name: 'product'
        },
        {
            path: '/admin/medidas/:id',
            component: Medidas,
            name: 'medidas'
        },
        {
            path: '/admin/descuento',
            component: Discount,
            name: 'descuento'
        },
        {
            path: '/admin/masivos',
            component: Masivos,
            name: 'masivos'
        },
    ]

})

Vue.component('admin-navigation', require('./components/admin/Navigation.vue').default);

const app = new Vue({
    el: '#app',
    vuetify: new Vuetify(),
    router
});
