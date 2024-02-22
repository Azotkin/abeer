<script>
import cartItemComponent from "@/components/Delivery/mainComponents/cartItemComponent.vue";

export default {
    components: {cartItemComponent},
    data: function () {
        return {

        }
    },
    inject:['dataSync']
}
</script>

<template>
    <section class="populer-area pd-top-50 pd-bottom-120">
        <div class="container">
            <div class="row justify-content-center">
                <cart-item-component
                    v-for="item in dataSync['cartItemComponent']"
                :basket="dataSync['basket']"
                :item="item"
                />
            </div>
        </div>
    </section>
</template>

<style scoped>

</style>
