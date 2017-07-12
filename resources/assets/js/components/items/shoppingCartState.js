// shopping cart state
export default {
    data: {
        cart: []
    },
    add (item) {
        var found = _.find(this.data.cart, ['Id', item.Id])
        if(typeof found != 'object') {
            this.data.cart.push({
                Id: item.Id,
                Name: item.Name,
                Price: item.Price,
                Quantity: 1
            })
        }
    },
    inc (item) {
        var found = _.find(this.data.cart, ['Id', item.Id])
        if(typeof found == 'object') {
            var index = _.indexOf(this.data.cart, found)
            this.data.cart[index].Quantity++
        }
    },

    dec (item) {
        var found = _.find(this.data.cart, ['Id', item.Id])
        if(typeof found == 'object') {
            var index = _.indexOf(this.data.cart, found)

            if(this.data.cart[index].Quantity == 1) {
                this.data.cart.splice(found,1)
            } else {
                this.data.cart[index].Quantity--
            }
        }
    }


}