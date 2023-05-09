import Vue from 'vue';
Vue.component('customer-list', require('./Components/Customer/List').default);
Vue.component('customer-item', require('./Components/Customer/Item').default);

Vue.component('tailwind-empty-resource', require('./Components/tailwind/EmptyResource').default);
Vue.component('tailwind-card', require('./Components/tailwind/Card').default);
Vue.component('tailwind-pagination', require('./Components/tailwind/Pagination').default);
Vue.component('resource-table-card', require('./Components/tailwind/ResourceTableCard').default);
