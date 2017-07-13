
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
require('vue-resource');

// Vue.http.interceptors.push((request, next) => {
//     request.headers.set( 'Authorization', 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImE5ZGQ3NTRhYjg4NDM3ZWQ1ZjRkYmU4YWYxMWM3MTM1Njg3YTVjYWExNjg2ZjIxOWNlZTVkNTI3ZmQ3ZjMzNmNmZDlmN2MyY2UxODQwYzU4In0.eyJhdWQiOiIzIiwianRpIjoiYTlkZDc1NGFiODg0MzdlZDVmNGRiZThhZjExYzcxMzU2ODdhNWNhYTE2ODZmMjE5Y2VlNWQ1MjdmZDdmMzM2Y2ZkOWY3YzJjZTE4NDBjNTgiLCJpYXQiOjE0OTk4MjE3NzMsIm5iZiI6MTQ5OTgyMTc3MywiZXhwIjoxNTMxMzU3NzczLCJzdWIiOiI2Iiwic2NvcGVzIjpbXX0.nn49DckHK-vEbNAfNRIizKDeHpijQe5Fb0FOShy8eRzqPq_tsWu9W7X_5muOFXr-mXT4IGuNRmtRuNeFpkc_w9_li-EctSgBi_xbTPnt6HTCg9cKAHR7TWK41ArOt14z_NPPCGGCX4aDs2RE9D_8BlqZ-SdOTkFH3GQFf1vMkbO0t8tkFAOQXAAvmF0ZaBYU9DYd8k6aK5sdejURbMoeyYy5gZbhXmmym1mBY-rnShAzgzZq0zFZ9jl6YPRpINxlJDPsEuu1JpnJNi5K9tvIU_z6g4K8oekWBtn54QiIwzxvuCJI2ScebyrET3OFN3AHIAawLYMplU5qqgiN9Lm4c3lEGqigDi6D4hqA-X4yxE6adlHRloVr5Acs7pvbRkiTWWXZfYNnrr7GcmMwT6PY9CPzvlx0T-MFHVKUuPy1PD0RUYoWjCj8jIS4RpiYnNhO3BzI1JkQT7-HNuX3rAsQPGPDDfrVNW__5SQDNdPOFoD24qMbOyhNn8gL5BKxjiqnyUuz7bN0mfVihhjP4y5QfOvtqUw1SWVRNCMEjemNNX8mQfpf5tJxeBz3Bg1TcqzJPYgt6zy5sSTkLdRR1G8iPkXS3pK4c7bAB6RyxqUQk0mwFJyL2SIJIxsbGXsPUtoJsFEsl4vo-CNMNu5ZSAYt4TVtph6PF56Ed7b8W0oW0vc');
//     request.headers.set('Accept', 'application/json');
//     next();
// });

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
Vue.component('adjustment', require('./components/Adjustment.vue'));

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
