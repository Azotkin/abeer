<script>
import CartItemComponent from "./cartItemComponent.vue";

export default {
    components: {CartItemComponent},
    data: function () {
        return {}
    },
    props: {
        basketItem: Object
    },
    computed: {
        basketStatus: function (){
            if( this.basketItem.length<=0 ){
                return 'Ваша корзина пуста'
            }
        }
}
}
</script>

<template>
    <div class="modal fade" id="basketModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <p>{{basketStatus}}</p>
                <div class="album py-5 bg-body-tertiary">
                    <div class="container">
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                            <cart-item-component
                                v-for="item in basketItem"
                                :item="item"
                                :basket="basketItem"
                            />
                        </div>
                        <button class="btn">Оформить заказ</button>
                    </div>
                </div>
            </div>

        </div>
    </div>

</template>

<style scoped>
.btn {
    background-color: #e3e2e2;
    color: #f3883b;
}

.btn:hover {
    background-color: #f3883b;
    color: #e3e2e2;
}
</style>
