import VueRouter from 'vue-router'
import store from "./store";

// let LoadersAndAnimations = () =>
//          import(/* webpackChunkName: "loaders" */'./components/LoadersAndAnimations');
// lazy loading routes


let routes = [

    {
       path: '*',
        meta: {
            auth: true
        },
       component: require('./views/NotFound').default
    },

    {
        path: '/',
        name: 'Home',
        meta: {
            auth: true
        },
        component: require('./views/Home').default
    },

    {
        path: '/login',
        name: 'Login',
        component: require('./views/Login').default
    },

    {
        path: '/clients',
        meta: {
            auth: true
        },
        component: require('./modules/Clients/Clients').default
    },

    {
        path: '/clients/detail/:clientId',
        name: 'ClientDetail',
        meta: {
            auth: true
        },
        component: require('./modules/Clients/ClientsDetail').default
    },

    {
        path: '/clients/edit/:clientId',
        name: 'ClientEdit',
        meta: {
            auth: true
        },
        component: require('./modules/Clients/ClientsEdit').default
    },

    {
        path: '/clients/new',
        name: 'ClientNew',
        meta: {
            auth: true
        },
        component: require('./modules/Clients/ClientsNew').default
    },

    {
        path: '/emails',
        meta: {
            auth: true
        },
        component: require('./modules/Emails/Emails').default
    },

    {
        path: '/settings',
        meta: {
            auth: true
        },
        component: require('./modules/Settings/Fields/Fields').default
    },

];

const router = new VueRouter({

    routes,

    linkActiveClass: 'active'
});

router.beforeEach((to, from, next) => {
    const loggedIn = store.getters.getUser;

    if (to.matched.some(record => record.meta.auth) && loggedIn===null) {
        next('/login');
        return;
    }

    next()
});

export default router;

