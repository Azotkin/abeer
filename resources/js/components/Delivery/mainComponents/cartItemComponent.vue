<script>
import deleteFromBasket from "./basketComponents/deleteFromBasket.vue";
import addToBasket from "./basketComponents/addToBasket.vue";
import {create} from "lodash";

export default {
    data: function () {
        return {
            showDescription: false,
            basketShow: false
        }
    },
    components: {
        deleteFromBasket,
        addToBasket
    },
    props: {
        item: Object,
        basket: Object
    },
    methods: {},
    computed: {
        isBasket: function () {
            let isFinded = false;
            if (this.basket) {
                let currentItem = this.item
                if (this.basket.find(e => e.id === currentItem.id)) {
                    isFinded = true
                }
            }
            return isFinded
        }
    }
}
</script>

<template>
    <div class="col-lg-6">
        <div class="single-item-wrap style-2">
            <div class="media">
                <div class="thumb">
                    <img :src="item.image_path" :alt="item.price">
                </div>
                <div class="wrap-details">
                    <h5>{{item.product_name}}</h5>
                    <p>{{ item.description }}</p>
                    <div class="wrap-footer">
                        <h6 class="price">₽{{item.price}}</h6>
                        <div class="price-button">
                                        <add-to-basket
                                            :item="item"
                                            :is-basket="isBasket"
                                        />
                                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!--    здесь кончается новая картайтем-->

<!--    <div class="cart_item row p-1 m-1">-->
<!--        <div class="pict col card-img">-->
<!--            <img class="img-fluid" :src="item.image_path" :alt="item.price">-->
<!--        </div>-->
<!--        <div class="product-name" @click="showDescription=!showDescription">-->
<!--            <h3>{{ item.product_name }}</h3>-->
<!--        </div>-->
<!--        <div v-if="showDescription" class="card-body">-->
<!--            <p class="card-text">{{ item.description }}</p>-->
<!--        </div>-->
<!--        <div class="category">-->
<!--            <h4> {{ item.category }}</h4>-->
<!--        </div>-->
<!--        <div class="price-button">-->
<!--            <add-to-basket-->
<!--                :item="item"-->
<!--                :is-basket="isBasket"-->
<!--            />-->
<!--        </div>-->
<!--    </div>-->
</template>

<style scoped>

img {
    border-radius: 50%;
}
</style>
