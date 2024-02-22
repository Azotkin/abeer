<script>
import BodyComponent from "./ComponentsAdminPanel/BodyComponent.vue";
import adminX from "./ComponentsAdminPanel/data"
import axios from "axios";

export default {
    data: function () {
        return {
            adminX: adminX
        }
    },
    created() {
        this.getOrders();
        this.getItems()
    },
    components: {
        BodyComponent

    },
    props: {},
    methods: {
        getItems() {
            axios({
                method: 'post',
                url: '/api/item/list/get'
            })
                .then(response => (this.adminX.carts = response.data)).catch(function (error) {
                this.adminX['errors'].push(error)
            })
        },
        getOrders() {
            axios({
                method: 'post',
                url: '/api/order/list/get'
            }).then(response => (this.adminX.orders = response.data)).catch(function (error) {
                this.adminX['errors'].push(error)
            })

        }
    },
    provide() {
     return{

     }
    },
}
</script>

<template>
    <body-component
        :data="adminX"
    />

</template>

<style scoped>

</style>
