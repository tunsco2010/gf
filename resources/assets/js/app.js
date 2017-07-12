
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
require('vue-resource');

Vue.http.interceptors.push((request, next) => {
    request.headers.set( 'Authorization', 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjI4ODc5Nzg2NjJiYjg5OTQxMjVmN2U3ZjRhYTU2NWY5MWIzY2NlYmU1MGZlNjMxYmQ5Njc0MmMxMDcxOTg3YjkyZDk1YmJhNWE3ZjJhN2MzIn0.eyJhdWQiOiIzIiwianRpIjoiMjg4Nzk3ODY2MmJiODk5NDEyNWY3ZTdmNGFhNTY1ZjkxYjNjY2ViZTUwZmU2MzFiZDk2NzQyYzEwNzE5ODdiOTJkOTViYmE1YTdmMmE3YzMiLCJpYXQiOjE0OTk4MTY5NzgsIm5iZiI6MTQ5OTgxNjk3OCwiZXhwIjoxNTMxMzUyOTc4LCJzdWIiOiI2Iiwic2NvcGVzIjpbXX0.LH5XoOpGwVByxTURhLQg5_fMXTrd7ShWnPDkfBH9thOYyIO0GniFuNe6KMS6SF96lvK5G5DDLQCx1HmavFZZjeh1BJIgdfKzFvOlhFYpRw-8cBKyTZku6yzhY_SONKF4he_E1biKhuKZOcGrtD4alA-vAkMvd3KrbaHTX5rVqyDzrAFflQm4DXMj13r-BboQ46ueZXi6vwZEMBQUtgEKgW2bII2Ty0l3pBbL_P04K1PtLoa_plIgpoyOGsaf2Tl_2iCwMO2TwZMry-VoPCWexdBYwEbbFeJGel4qj02ItulS4VfvOK1r3ovN6gynZFX0SaQWLy57QFpD91C-eJtR40bXY6aIaINOkjKCu67I7SbFjljJ4XdwNPL8RWaE5cdlQD3loOBp9U8CnKXNykOzPAu5q3EaBNghd9efmsh5GLLefbJheKxP7ZVAxJyQV7Ykq1utywSo5JOd6SPm978_8kAIhpfhhJgRgC94toUDl01Qy9tP7QklwhLLQb-Q6Q8gpXz3tLsayb_kHvCVIH9hZHD8aQF56b-ZqEPKJSydkI4TP9uuG9zomxu7Xo4OtZ9fAaPpU6xtjSqhxTK-XQEei7TlLWwm7O5pUPs63rVQFve7OD_CN0R5l5kmA_q7q_jo8J5W3eRD0SX1_g0YL43sBWvcRAbIoWDyeC46erTMYB0');
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
