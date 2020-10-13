import Vuex from 'vuex'
import Vue from "vue";

Vue.use(Vuex);


export default new Vuex.Store({
    state: {
        userData: localStorage.getItem('user')? JSON.parse(localStorage.getItem('user')) : null
    },

    mutations: {
        setUserData (state, data) {
            localStorage.setItem('user', JSON.stringify(data));
            state.userData = data;
        },

        clearUserData(state){
            localStorage.removeItem('user');
            state.userData = null;
        }
    },

    getters: {
        getUser: state => {
            return state.userData;
        }
    }
});
