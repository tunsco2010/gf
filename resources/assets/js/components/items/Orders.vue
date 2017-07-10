<template>
            <div class="container">
                <div >
                    <div class="products">
                        <item v-for="item in items" :item="item" :key="item.id"></item>
                    </div>
                </div>

                <div class="shopping-cart">
                    <shopping-cart></shopping-cart>
                </div>
            </div>
</template>

<script>
    import ShoppingCart from './ShoppingCart.vue';
    import Item from './Item.vue';

    export default {

        created() {
            this.loadData();
        },

        data() {
           return {
               items: []
           }
        },

        methods: {
            loadData: function () {
                var self = this;

                $.getJSON('/api/items-data', function (data) {
                    self.items = data.data;
                });

            }
        },

        components: {Item, ShoppingCart}
    }
</script>

<style>

    .products {
        width: 75%;
        float: left;
    }

    .shopping-cart {
        width: 25%;
        float: right;
    }
</style>
