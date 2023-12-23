<script>
import countProductComponent from "./countProductComponent.vue";
import axios from "axios";
export default {
    data:function(){
        return{
        phoneNumber:' ',
            totalPrice:0,
            responseStatus:''
        }
    },
    created(){

    },
    components:{countProductComponent},
    props:{
        basket: Array
    },
    methods:{
        sendApiOrder(){
            let getLocalStorage=localStorage
           let stringGetLocalStorage= JSON.stringify(getLocalStorage)
            axios({
                method: 'post',
                url: '/api/send/order',
                data: {
                    order: stringGetLocalStorage,
                    phoneNumber: this.phoneNumber
                }
            }).then(response=>(this.responseStatus=response.data)).catch((error)=>{console.log(error.data)});
        }
    },
    computed:{
        getTotalPrice(){
            let total=0
            for(let i =0; i<this.basket.length;i++){
                total=total+ (this.basket[i]['price']*localStorage[this.basket[i]['id']])
            }
            return total
        }
    },
name: "orderComponent"
}
</script>

<template>
<div class="container">
<!--   тут вставить блок для отображения ошибки валидации-->
    <div class="response" v-if="responseStatus!==''"><h1>{{responseStatus}} </h1></div>
<div class="row">
    <div class="col">Наименование товара</div>
    <div class="col">цена за шт</div>
    <div class="col">колличество</div>
</div>
    <div class="row" v-for="item in basket">
        <div class="col">{{item['product_name']}}</div>
        <div class="col">{{item['price']}}</div>
        <div class="col"><count-product-component
        :id="item['id']"
        />
        </div>
        <div class="col">{{getTotalPrice}}</div>
    </div>
    <form>
        <input name="phoneNumber" type="text" class="form-control" placeholder="Введите номер телефона для связи" v-model="phoneNumber">
        <button class="btn btn-dark" @click.prevent="sendApiOrder">Отправить заказ</button>
    </form>
</div>

</template>

<style scoped>

</style>
