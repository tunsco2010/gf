<template>
    <div class="cart">
        <p class="cart-title">Shopping Cart</p>
        <p class="cart-empty" v-if="total == 0">Your Shopping Cart is Empty</p>
        <div class="items" v-else>
            <div class="item clearfix" v-for="item in items">
                <div class="item-details">
                    <p class="item-title">{{item.Name}}</p>
                    <p class="item-price">
                        <span>x{{item.Quantity}}</span>
                        <span class="right">&#x20A6;{{item.Quantity * item.Price}}</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="cart-total">
            <span>Total</span>
            <span class="right">&#x20A6;{{total}}</span>
        </div>

        <br>

        <pos-autocomplete label="Customer" src="/api/customers" placeholder="Search customer" :select="autocompleteSelect"></pos-autocomplete>

        <br>
        <p class="right"><button class="btn btn-default" @click="checkout">Checkout</button></p>

    </div>
</template>

<script>

    import _ from 'lodash';
    import State from './shoppingCartState';

    export default {
        data() {
            return {
                items: State.data.cart,
                form: {
                    customer: {},
                }
            }
        },

        computed: {
            total() {
                return _.sumBy(this.items, function(item) {
                    return (item.Price * item.Quantity)
                })
            }
        },

        methods: {
                checkout() {

                    if (confirm('this process cannot be undone'))
                    {
                        var self = this;

                        axios.post('/api/sales', {
                            customer_id: this.form.customer.id,
                            items: _.map(this.items, function(cart){
                                return {
                                    item_id: cart.Id,
                                    quantity: cart.Quantity,
                                    price: cart.Price
                                }
                            })
                        })
                            .then(function (response) {
                                let responseBody = response.data

                                self.items = []
                                self.form.customer = {}

                                $.notify('Order created with <a href="/order/receipt/' + responseBody.id + '" target="_BLANK">INVOICE</a>', {
                                    type: 'success',
                                    placement: {
                                        from: 'bottom'
                                    }
                                })

                                window.open('/order/receipt/' + responseBody.id)
                            })
                            .catch(function (error) {
                                console.log(error);
                            });

                    }
                },
            autocompleteSelect(data) {
                this.form.customer = data
            }
        }
    }

</script>


<style>
    .cart {
        margin-left: 1em;
    }
    .cart-title {
        margin: 0.5em 0 0 0;
        font-weight: bold;
        text-transform: uppercase;
        text-align: center;
        padding: 0.75em;
        background: #35495E;
        color: #fff;
    }

    .cart-empty {
        text-align: center;
        margin: 4em 0 0 0;
        min-height: 300px;
    }
    .cart-total {
        background: #F1F1F1;
        margin: 0;
        padding: 0.75em;
    }

    .items {
        min-height: 300px;
    }

    .item {
        padding: 0.75em 0.5em;
        border-top: 1px solid #ddd;
    }

    .right {
        float: right;
    }

    .item-image {
        float: left;
        width: 20%;
    }
    .item-details {
        float: left;
        width: 80%;
        padding-left: 0.75em;
    }
    .item-title {
        margin: 0;
        font-weight: bold;
    }
    .item-price {
        margin: 0;
        font-size: 0.9em;
    }
</style>