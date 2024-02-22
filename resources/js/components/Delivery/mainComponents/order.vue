<script>
import axios from 'axios'
import countProductComponent
    from "@/components/Delivery/mainComponents/newBasketComponents/orderComponent/countProductComponent.vue";

export default {

    data: function () {
        return {
            totalPrice: this.$root.dataSync['totalTotalPrice'],
            phoneNumber:8999999999,
            address:'',
            paymentMethod:'cash',
            responseStatus:''
        }
    },
    methods:{
        sendApiOrder(){
            let getLocalStorage=this.$root.dataSync['basket']
            let stringGetLocalStorage= JSON.stringify(getLocalStorage)
            axios({
                method: 'post',
                url: '/api/send/order',
                data: {
                    order: stringGetLocalStorage,
                    phoneNumber: this.phoneNumber,
                    address: this.address,
                    payment_method:this.paymentMethod
                }
            }).then(response=>(this.responseStatus=response.data)).catch((error)=>{console.log(error.data)});
        }
    },
    computed:{

    }
}
</script>

<template>
    <div class="checkout-area pd-top-120 pd-bottom-120">
        <div class="container">
            <span v-if="responseStatus!==''">{{responseStatus}}</span>
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="bill-payment-wrap">
                        <h5>Детали заказа</h5>
                        <form class="default-form-wrap style-2">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Имя</label>
                                    <div class="single-input-wrap">
                                        <input class="form-control" placeholder="Ваше имя">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Фамилия</label>
                                    <div class="single-input-wrap">
                                        <input type="text" class="form-control" placeholder="Фамилия">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Введите адрес</label>
                                    <div class="single-input-wrap">
                                        <input class="form-control" placeholder="" v-model="address">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Номер телефона</label>
                                    <div class="single-input-wrap">
                                        <input class="form-control" placeholder="Номер телефона" v-model="phoneNumber">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="order-area">
                        <h5 class="title">Ваш заказ</h5>
                        <div class="order-product">
                            <div class="thumb">
                                <img src="assets/img/widget/01.png" alt="img">
                            </div>
                            <div class="details">
                                <h6>All Season Gulliver Pizza</h6>
                                <ul>
                                    <li><span>Select Size: </span>Large</li>
                                    <li><span>Select Crust: </span>Double Crust</li>
                                </ul>
                            </div>
                        </div>
                        <ul class="amount">
<!--                            <li>Subtotal<span>₽{{totalPrice}}-->
<!--                            </span></li>-->
                            <li class="total">Итого<span>₽{{totalPrice}}</span></li>
                        </ul>
                        <div class="peyment-method">
                            <h6>Оплата</h6>
                            <ul class="card-area">
                                <div class="mb-3">
                                    <select class="form-select" aria-label="Product" v-model="paymentMethod">
                                        <option value="cash">Наличными</option>
                                        <option value="onlineTransfer">Переводом</option>
                                    </select>
                                </div>
                            </ul>
                        </div>
                        <a class="btn btn-secondary w-100" @click="sendApiOrder"> Отправить заказ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style>

</style>
