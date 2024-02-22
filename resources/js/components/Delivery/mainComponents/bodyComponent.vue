<script>
import newBasketComponent from "./newBasketComponent.vue";
import carts from "@/components/Delivery/mainComponents/carts.vue";
import addToBasket from "@/components/Delivery/mainComponents/basketComponents/addToBasket.vue";
import order from './order.vue'
export default {
    data: function () {
        return {
            tabs: [
                'carts',
                'newBasketComponent',
                'order'
            ]
        }
    },
    components: {
        addToBasket,
        carts,
        newBasketComponent,
        order
    },
    props: {
        data: Object
    },
    methods: {

    },
    computed:{
        currentTabComponent() {
            this.$root.getItems()
            return this.tabs[this.data['tabs']]
        }
    }
}
</script>

<template>
    <body class="sc5">
    <div class="body-overlay" id="body-overlay"></div>
<!--    <new-basket-component-->
<!--        :basketItem="this.data['basket']"-->
<!--        :totalPrice="this.data['totalPrice']"-->
<!--    />-->
<keep-alive>
    <component
        :is="currentTabComponent"
        :basketItem="this.data['basket']"
        :totalPrice="this.data['totalPrice']"
    ></component>
</keep-alive>



    </body>
</template>

<style scoped>


</style>
