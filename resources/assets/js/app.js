
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
require('vue-resource');

Vue.http.interceptors.push((request, next) => {
    request.headers.set( 'Authorization', 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImQ2ZjQyYjVmNjRiMTBhNGYxZWQ3ZmRkNmZjNzBiZGFhZmFmN2U5ZTFmMDdkYzI1YzUxMjYzYzk4MDY2N2RlZWRiNGEzY2E1MTUyYTZiMTUyIn0.eyJhdWQiOiIzIiwianRpIjoiZDZmNDJiNWY2NGIxMGE0ZjFlZDdmZGQ2ZmM3MGJkYWFmYWY3ZTllMWYwN2RjMjVjNTEyNjNjOTgwNjY3ZGVlZGI0YTNjYTUxNTJhNmIxNTIiLCJpYXQiOjE0OTk3OTUzMjcsIm5iZiI6MTQ5OTc5NTMyNywiZXhwIjoxNTMxMzMxMzI3LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.I7dsRM_XfdHEk-mIkumEm7nVVgloMYeA6B3jKSlUXueUqVkZy51UOtqdSJLuqE3uLpF12-S5BCEN6WR8Jy4LxIgdv-M0SOx4NiT_QzCzSngrJnSSqWva4PAWE3Dv0XW_ZynEpVEjFFZ8_ScNC2S8fzi6rXo-mfuwFp_8VTS4-WRHxKYsTS5FwQea8QoFU87lI8x-0RwqUEt6xqsfX0BV9VyHgXMbOhZVt82pPu94_-Ck6bo-r8-vYMTKdTIJusv1V2jNVsV7W0e-P_3V6b_yvIg2ueyur3assUSoL_yJsGN5FWi0RhghtuTEyUrPg7OycI6kKcQup7L84xAtRTOLmTk4xNFkJfJVfkgW2CJNb7KFTA8EySaNa9XD-6SSIicZRhx2det3jBrgCANfxxIhV_vZyfSxVKSaRZjSxTVNhpZR1GMDAGEq19q18C7-s29ylIlPHcw6LVuCqPouoY6WhS4VDjSLqOMm1Qnr5p0-fJL1ilmw7xWB-D7ICOi42S-9JhUWMjf-45UG-KWXfCEF1gsOUOo-cRbPaP2DYRti_fRepsVm2kT3j-HUn6BY4EpIqGNcS_Gronw2AjqD6daoKHk6SPW2e7Y2mn884akbLTlIGKm0UJYiUzW1HXXzrChzFUpht8jQujG8gUpors4FN2p9grEGZJpjidhkFffXies');
    request.headers.set('Accept', 'application/json');
    next();
});

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
Vue.component('pos-autocomplete', require('./components/helpers/PosAutoComplete.vue'));
Vue.component('receiving', require('./components/Receiving.vue'));

Vue.component('product-grid', require('./components/ProductGrid.vue'));
Vue.component('product-list', require('./components/ProductList.vue'));

Vue.component('item', require('./components/items/Item.vue'));
Vue.component('shopping-cart', require('./components/items/ShoppingCart.vue'));
Vue.component('orders', require('./components/items/Orders.vue'));


Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue')
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue')
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue')
);

const app = new Vue({
    el: '#app'
});
