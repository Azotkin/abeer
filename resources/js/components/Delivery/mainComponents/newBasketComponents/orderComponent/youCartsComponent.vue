<script>

import countProductComponent from "../../basketComponents/countProductComponent.vue";

export default {
    components: {
        countProductComponent

    },
    data: function () {
        return {}
    },
    props: {
        basketItem:Object
    },
    methods: {
        catchCount(count){
            localStorage[this.basketItem['id']]=count;
        }
    },
    computed: {}
}
</script>

<template>
    <li class="list-group-item d-flex justify-content-between lh-sm">
        <div>
            <h6 class="my-0">{{basketItem['product_name']}}</h6>
<!--            <small class="text-body-secondary">{{ basketItem['description'] }}</small>-->
            <div class="count">
                <count-product-component
                    :id="basketItem['id']"
                    v-on:catch-count="catchCount"
                />
            </div>
        </div>
        <span class="text-body-secondary">&#x20bd{{basketItem['price']}}</span>
    </li>
</template>

<style scoped>

</style>
