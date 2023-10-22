<script>
import cartItemComponent from "./cartItemComponent.vue";
import addToCart from "./addToCart.vue"
import basketComponent from "./basketComponent.vue";

export default {
    data: function () {
        return {}
    },
    components: {
        cartItemComponent,
        addToCart,
        basketComponent
    },
    props: {
        itemsApiData: Object,
        basketItem: Object
    }
}
</script>

<template>
    <add-to-cart/>
    <basket-component
        :basketItem="basketItem"
    />
    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <cart-item-component
                    v-for="item in itemsApiData"
                    :item="item"
                    :basket="basketItem"
                />
            </div>
        </div>
    </div>

</template>

<style scoped>


</style>
