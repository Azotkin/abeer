<script>
import addToCart from "./addToCart.vue"
import cartWindow from "./cartWindow.vue"

export default {
    data: function () {
        return {}
    },
    components: {
        addToCart,
        cartWindow
    },
    props: {
        item: Object
    },
    methods:{
    updateDate() {
        this.$root.getItems()
    }
    }
}
</script>

<template>
    <div class="container">
        <div class="row">
            <div class="div"><button class="btn btn-outline-warning m-2" @click="updateDate"> Обновить данные</button></div>
            <div class="col">
                <cart-window
                :item="item"
                />
            </div>
            <div class="col-4">
                <add-to-cart/>
            </div>
        </div>
    </div>

</template>

<style scoped>

</style>
