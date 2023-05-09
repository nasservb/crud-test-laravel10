require('./bootstrap');

import Vue from 'vue';
import {__, route} from './laravelify'
import router from "./router";

require('./components');

window.route = route;
window.__ = __;
Vue.prototype.route = (key, params = false) => {
    return route(key, params);
};

window.events = new Vue();
Vue.prototype.__ = (key, params = false) => {
    return __(key, params);
};


Vue.prototype.auth = window.auth;
Vue.prototype.token = window.token;

let bus = new Vue();
window.bus = bus;
Vue.component('app', require('./AppLayout').default);
const app = new Vue({
    el: '#app',
    router,
});


