<script>
import CartItemComponent from "./cartItemComponent.vue";
import orderComponent from "./basketComponents/orderComponent.vue";

export default {
    components: {
        CartItemComponent,
        orderComponent
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

    <!------------------------------------------------------------------------------------------------------------------>
    <div class="modal fade" id="basketModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">


            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel">{{ basketStatus }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>
                <div class="modal-body">
                    <div class="album py-5 bg-body-tertiary">
                        <div class="container">
                            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                                <cart-item-component
                                    v-if="basketTabsFlag"
                                    v-for="item in basketItem"
                                    :item="item"
                                    :basket="basketItem"
                                />
                                <order-component
                                v-if="!basketTabsFlag"
                                :basket="basketItem"
                                />
                            </div>
                            <button v-if="basketTabsFlag" class="btn" @click="syncBasket">Оформить заказ</button>
                            <button v-if="!basketTabsFlag" class="btn" @click="syncBasket">Вернуться в корзину</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>

</template>

<style scoped>
.btn {
    background-color: #e3e2e2;
    color: #f3883b;
}

.modal-title {
    color: #264056;
}

.btn:hover {
    background-color: #f3883b;
    color: #e3e2e2;
}
</style>
