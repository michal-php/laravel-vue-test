require('./bootstrap');

import router from "./routes"

import Navbar from "../js/components/navbar";

import 'bootstrap/dist/css/bootstrap.css'

import 'bootstrap-vue/dist/bootstrap-vue.css'

import store  from './store';

axios.interceptors.response.use(function (response) {
    return response;
}, function (error) {
    console.log('ERROR '+error);
    console.log('ERROR '+error.response.status);
    if (401 === error.response.status) {
        store.commit('clearUserData');
        return router.push('Login');
    } else {
        return Promise.reject(error);
    }
});


new Vue({

    el: '#app',
    components: {Navbar},

    data() {
        return {
            user: null,
        }
    },
    store: store,

    router,

    created() {
        this.user = store.state.userData
    }
});



