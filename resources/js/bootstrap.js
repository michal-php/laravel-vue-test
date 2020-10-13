window._ = require('lodash');

import Vue from 'vue';

import VueRouter from 'vue-router';

import { BootstrapVue, BootstrapVueIcons } from 'bootstrap-vue';

import Vuex from 'vuex'

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */
window.Vue = Vue;

Vue.use(VueRouter);

Vue.use(BootstrapVue);
Vue.use(BootstrapVueIcons)

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.defaults.withCredentials = true;
