<script>
import orderCarts from "@/components/Delivery/adminPanel/ComponentsAdminPanel/ordersTab/orderCarts.vue";
export default {
    data: function () {
        return {
            phoneNumber:0,
            user_id:0,
            products:{},
            payment_method:'',
            orderStatus:false,
            orders: this.$root.adminX['orders']
        }

    },
props:{
    item: Object
},
    components:{orderCarts},
    methods:{
        ordersUpdate(){
            this.$root.getOrders()
        }
    }
}
</script>

<template>


    <div class="container">
        <button class="btn btn-outline-warning" @click="ordersUpdate">Обновить данные</button>
        <button class="btn btn-outline-danger m-2" @click="ordersUpdate">Новые заказы</button>
        <button class="btn btn-outline-success m-2" @click="ordersUpdate">Отработанные заказы</button>
<table class="table table-hover">
    <thead>
        <th scope="col">id</th>
        <th scope="col">Адресс</th>
        <th scope="col">номер телефона</th>
        <th scope="col">Вид оплаты</th>
        <th scope="col">дата заказа</th>
        <th scope="col">Кнопка</th>
        </thead>
    <tbody class="table-striped">
    <order-carts
        v-for="order in orders"
        :order="order"/>
    </tbody>
</table>






    </div>
</template>

<style scoped>

</style>
