<script>
import deleteFromBasket from "./basketComponents/deleteFromBasket.vue";
import addToBasket from "./basketComponents/addToBasket.vue";
import countProductComponent from "./basketComponents/countProductComponent.vue";
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
        addToBasket,
        countProductComponent
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
    <div class="row p-2">
        <div class="col card-img">
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
img {
    width: auto;
    max-width: 300px;
    max-height: 300px;
}

.category {
    color: #1e7e34;
}


</style>
