import Vue from 'vue'
import VueRouter from 'vue-router'
import store from './store';
Vue.use(VueRouter)
let routes = [
    {
        path: '/',
        component: require('./components/home/main').default,
    },
    {
        path: '/register',
        component: require('./components/auth/register').default,
        name: 'register',
        meta: {
            requiredVisitor: true,
        }
    },

    {
        path: '/email_varify/:email/:id',
        component: require('./components/auth/email_varify').default,
        name: 'email_varify'
    },
    {
        path: '/login',
        component: require('./components/auth/login').default,
        name: 'login',
        meta: {
            requiredVisitor: true,
        }
    },
    {
        path: '/logout',
        component: require('./components/auth/logout').default,
        name: 'logout',
    },
    {
        path: '/dashboard',
        component: require('./components/dashboard/dashboard').default,
        name: 'dashboard',
        meta: {
            requiresAuth: true,
        }
    },

];
const router = new VueRouter({
    routes,
    // mode: 'history',
});

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        if (!store.getters.logedIn) {
            next({
                name: 'login',
            })
        } else {
            next()
        }
    } else if (to.matched.some(record => record.meta.requiredVisitor)) {
        if (store.getters.logedIn) {
            next({
                path: '/',
            })
        } else {
            next()
        }
    } else {
        next() // make sure to always call next()!
    }
});

export default router;
