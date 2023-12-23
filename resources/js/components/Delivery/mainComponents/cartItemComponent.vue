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
        basket: Array
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
    <div class="cart_item row p-1 m-1">
        <div class="pict col card-img">
            <img class="img-fluid" :src="item.image_path" :alt="item.price">
        </div>
        <div class="product-name" @click="showDescription=!showDescription">
            <h3>{{ item.product_name }}</h3>
        </div>
        <div v-if="showDescription" class="card-body">
            <p class="card-text">{{ item.description }}</p>
        </div>
        <div class="category">
            <h4> {{ item.category }}</h4>
        </div>
        <div class="price-button">
            <add-to-basket
                :item="item"
                :is-basket="isBasket"
            />

        </div>
    </div>
</template>

<style scoped>
.pict{
    border-radius: 50%;
}
img {
    width: auto;
    max-width: 300px;
    max-height: 300px;
    border-radius: 50%;
}

.category {
    color: #1e7e34;
}
.cart_item{
    background-color: #d1c3b3;
}


</style>
