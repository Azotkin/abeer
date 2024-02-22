<script>
import youCartsComponent from "./newBasketComponents/orderComponent/youCartsComponent.vue";
import OrderComponent from "./newBasketComponents/orderComponent/orderComponent.vue";

export default {
    components: {
        OrderComponent,
        youCartsComponent
    },
    data: function () {
        return {
            basketTabsFlag: true,
            sum:0
        }
    },
    props: {
        basketItem: Object,
        totalPrice: Array
    },
    methods: {
        getFullTotalPrice() {
            let obj = this.$root.dataSync.totalPrice
            let sum = 0
            for (let item in obj) {
                if (true) {
                    sum = sum + obj[item];
                }
            }
            return this.sum = sum
        },
        syncBasket() {
            if (this.basketTabsFlag) {
                this.$root.getItems()
                this.basketTabsFlag = !this.basketTabsFlag
            } else {
                this.basketTabsFlag = !this.basketTabsFlag
            }
        },
        push(number){
            this.$root.dataSync['tabs']=number
        }
    },
    computed: {
        basketStatus: function () {
            if (this.basketItem.length <= 0) {
                return 'Ваша корзина пуста'
            } else {
                return 'Корзина'
            }
        }
    }
}
</script>

<template>

                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="basket_status">{{ basketStatus }}</div>
                                <div class="table-responsive mb-4">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th class="blank"></th>
                                            <th class="blank"></th>
                                            <th class="blank"></th>
                                            <th class="title-name">Название</th>
                                            <th scope="col">Цена</th>
                                            <th scope="col" @click="getFullTotalPrice">Количество</th>
                                            <th>Итого</th>
                                        </tr>
                                        </thead>
                                        <you-carts-component
                                            v-for="items in basketItem"
                                            :item="items"
                                            v-on:get-full-total-price="getFullTotalPrice"
                                        />
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="promotional-area">
                                    <form class="default-form-wrap">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-6">
                                                <div class="single-input-wrap">
                                                    <input type="text" class="form-control" placeholder="Код купона">
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-6">
                                                <button type="submit" class="btn btn-secondary">ЕСТЬ КУПОН</button>
                                            </div>
                                            <div class="col-md-4 col-sm-6 text-md-end">
                                                <button type="submit" class="btn btn-base">UPDATE CART</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="order-cart-area">
                                    <div class="order-cart">
                                        <h5>В корзине товаров</h5>
                                        <ul>
                                            <li>Итого<span>₽{{sum}}</span></li>
                                            <li class="total">Итого<span>₽{{ sum }}</span></li>
                                        </ul>
                                    </div>
                                    <a class="btn btn-secondary w-100" @click="push(2)"> Оформить заказ</a>
                                </div>
                            </div>
                        </div>
                    </div>

</template>

<style>

</style>
