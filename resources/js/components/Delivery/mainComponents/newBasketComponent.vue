<script>
import yourCartComponent from "./newBasketComponents/yourCartComponent.vue";
import OrderComponent from "./newBasketComponents/orderComponent/orderComponent.vue";
export default {
    components: {
        OrderComponent,
        yourCartComponent,
    },
    data: function () {
        return {
            basketTabsFlag: true
        }
    },
    props: {
        basketItem: Object
    },
    methods:{
        syncBasket(){
            if(this.basketTabsFlag){
                this.$root.getItems()
                this.basketTabsFlag=!this.basketTabsFlag
            }else{
                this.basketTabsFlag=!this.basketTabsFlag
            }
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
    <div class="modal fade" id="basketModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">


            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel">{{ basketStatus }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <main>
                            <div class="row g-5">
                                <order-component
                                    :basket="basketItem"
                                />
                                <your-cart-component/>
                            </div>
                        </main>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
