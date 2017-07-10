
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
require('vue-resource');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));
Vue.component('supplier-grid', require('./components/SupplierGrid.vue'));
Vue.component('customer-grid', require('./components/CustomerGrid.vue'));
Vue.component('category-grid', require('./components/CategoryGrid.vue'));
Vue.component('item-grid', require('./components/ItemGrid.vue'));

Vue.component('product-grid', require('./components/ProductGrid.vue'));
Vue.component('product-list', require('./components/ProductList.vue'));

Vue.component('item', require('./components/items/Item.vue'));
Vue.component('shopping-cart', require('./components/items/ShoppingCart.vue'));
Vue.component('orders', require('./components/items/Orders.vue'));

const app = new Vue({
    el: '#app'
});
