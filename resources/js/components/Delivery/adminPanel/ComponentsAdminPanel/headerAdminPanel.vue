<script>
import order from "../../mainComponents/order.vue";

export default {
    data: function () {
        return {

        }
    },
    methods:{
        push(number){
            this.$root.adminX['tabStatus']=number;
        }
    },
    computed:{
        order() {
            return order
        },
        ordersCount(){
            return this.$root.adminX['orders'].length
        }
    }
}
</script>

<template>
    <header>
        <div class="container text-center">
            <div class="row p-2">
                <div class="col">
                    <button class="btn btn-success" @click="push(0)">Управление товарами</button>
                </div>
                <div class="col">
                    <button class="btn btn-secondary" @click="push(1)">Управление сайтом</button>
                </div>
                <div class="col">
                    <button class="btn btn-secondary" @click="push(2)">Заказы <span class="orders-count">{{ordersCount}}</span></button>
                </div>
                <div class="col">
                    <button class="btn btn-secondary" @click="push(3)">что-то еще</button>
                </div>
            </div>
        </div>
        <hr>
    </header>
</template>

<style scoped>
.orders-count{
    color: red;
}
</style>
