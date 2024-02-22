<script>
import axios from 'axios'
import orderModal from "./orderModal.vue"
import triggerButtonWindow from './triggerButtonModalWindow.vue'

export default {
    data: function () {
        return {
            orderStatus: this.order['order_status'],
            responseFromServer:'',
            orderArray:JSON.parse(this.order.products)
        }
    },
    created(){
        // this.orderArray=JSON.parse(this.order.products)
    },
    components:{
        orderModal,
        triggerButtonWindow
    },
    props: {
        order: Object
    },
    methods: {
        takeOrder() {
            axios({
                method: 'post',
                url: 'api/order/take',
                data: {
                    id: this.order['id'],
                    order_status: false
                }
            })
                .then(response => (this.responseFromServer = response.data))
                .catch(error => (this.responseFromServer = error.response.data.message));

        }
    },
    computed:{}
}
</script>

<template>
    <order-modal   :id="order">
        <div class="container">
            <table class="table">
                <thead>
                <th scope="col">id</th>
                <th scope="col">Цена</th>
                <th scope="col">Категория</th>
                <th scope="col">Создан</th>
                <th scope="col">Описание</th>
                <th scope="col">Название</th>
                </thead>

                <tbody class="table-striped">
                <tr>
<!--                    <td class="table">{{orderArray2['id']}}</td>-->
<!--                    <td class="table">{{orderArray[0]['price']}}</td>-->
<!--                    <td class="table">{{orderArray[0]['category']}}</td>-->
<!--                    <td class="table">{{orderArray[0]['created_at']}}</td>-->
<!--                    <td class="table">{{orderArray[0]['description']}}</td>-->
<!--                    <td class="table">{{orderArray[0]['product_name']}}</td>-->
                </tr>
                </tbody>
            </table>
        </div>
        </order-modal>
        <tr v-if="orderStatus!==0">
            <td class="table-warning">{{ order['id'] }}</td>
            <td class="table">{{ order['address'] }}</td>
            <td class="table-warning">{{ order['phone_number'] }}</td>
            <td class="table">{{ order['payment_method'] }}</td>
            <td class="table-warning">{{ order['created_at'] }}</td>
            <td class="table">
<!--                кнопка триггер модального окна-->
                <trigger-button-window
                :id="order"
                />
            </td>
            <td class="table">
                <button class="btn btn-outline-primary" @click="takeOrder(); orderStatus=0">В работу</button>
            </td>
        </tr>

<!--Таблица с принятым заказом-->
    <tr v-else>
        <td class="table-secondary">{{ order['id'] }}</td>
        <td class="table">{{ order['address'] }}</td>
        <td class="table-secondary">{{ order['phone_number'] }}</td>
        <td class="table">{{ order['payment_method'] }}</td>
        <td class="table-secondary">{{ order['created_at'] }}</td>
        <td class="table">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#orderModal">
                Заказ
            </button>
        </td>
        <td class="table">
            <button class="btn btn-secondary" disabled>В работе</button>
        </td>
    </tr>


</template>

<style scoped>

</style>
