import Vue from "vue";

import VueRouter from "vue-router";


import appRoot from './Pages/Root';
import customerIndex from './Pages/Customer/Index';
import customerShow from './Pages/Customer/Show';
import customerEdit from './Pages/Customer/Edit';
import customerCreate from './Pages/Customer/Create';

const routePaths = [
    {
        path: '/',
        name: 'root',
        component: appRoot
    },
    {
        path: '/',
        name: 'panel',
        component: customerIndex
    },
    {
        path: '/show/:customer',
        name: 'show',
        component: customerShow
    },
    {
        path: '/edit/:customer',
        name: 'edit',
        component: customerEdit
    },
    {
        path: '/create',
        name: 'create',
        component: customerCreate
    },
];
// configure router
Vue.use(VueRouter);
const router = new VueRouter({
    mode: 'history',
    base: '/home',
    routes: routePaths
})

export default router;
