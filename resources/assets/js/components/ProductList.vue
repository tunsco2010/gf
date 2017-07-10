<template>
    <div class="col-md-4">
        <div class="list-group ">
            <button class="list-group-item item" v-for="item in items" @click="addOrder">
                <strong>{{ item.Name }}</strong> - {{ item.Price }}
            </button>
        </div>
    </div>

</template>

<script>
    export default {
        mounted: function () {
            this.loadData();
        },
        data: function () {
           return {
               items: []
           }
        },
        methods: {
            loadData: function () {
                $.getJSON('api/products-data', function (data) {
                    this.items = data.data;
                }.bind(this));
            },
            addOrder: function () {
                
            }
        }
    }
</script>