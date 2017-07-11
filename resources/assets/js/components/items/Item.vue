<template>
    <div class="product">
        <p class="title">{{item.Name}}</p>
        <p class="price">
            <span>&#x20A6;{{item.Price}}</span>
            <span class="qty" v-if="qtyInCart > 0">x{{item.Quantity}}</span>
        </p>

        <div class="controls">
            <p v-if="this.item.Quantity <= 0">Sorry this item is out of stock, please check back soon!</p>
            <p v-else></p>
            <button class="add-btn" @click="addToCart" v-if="qtyInCart == 0" v-show="this.item.Quantity > 0">Add To Cart</button>
            <div class="clearfix" v-else>
                <button class="inc" @click="inc">+</button>
                <button class="dec" @click="dec">-</button>
            </div>
        </div>
    </div>
</template>

<script>

    import _ from 'lodash';
    import State from './shoppingCartState';

    export default {
        props: ['item'],

        data() {
            return {
                shared: State.data
            }
        },

        methods: {
            addToCart() {
                State.add(this.item)
            },

            inc() {
                State.inc(this.item)
            },

            dec() {
                State.dec(this.item)
            }

        },

        computed: {
            qtyInCart() {
                var found = _.find(this.shared.cart, ['Id', this.item.Id])
                if(typeof found == 'object') {
                    return found.Quantity
                } else {
                    return 0
                }

            },

        }
    }

</script>


<style>
    .product {
        float: left;
        width: 25%;
        padding: 0.5em 0.5em;
        margin-bottom: 1em;
    }
    .image {
        display: block;
        width: 100%;
    }
    .title {
        font-weight: bold;
        margin: 0.35em 0;
    }
    .price {
        margin: 0.35em 0;
        font-size: 0.9em;
    }
    .qty {
        float: right;
    }
    .add-btn, .inc, .dec {
        display: block;
        border: none;
        padding: 0.5em;
        outline: none;
    }
    .add-btn {
        width: 100%;
        background: #41B883;
        color: #fff;
    }
    .inc {
        width: 49%;
        background: #418cb8;
        margin-right: 1%;
        color: #fff;
        float: left;
    }
    .dec {
        width: 49%;
        background: #418cb8;
        color: #fff;
        margin-left: 1%;
        float: left;
    }
</style>