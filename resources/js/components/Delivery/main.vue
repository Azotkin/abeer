<script>
import headerComp from './mainComponents/headerComp.vue'
import bodyComponent from "./mainComponents/bodyComponent.vue";
import footerComponent from "./mainComponents/footerComponent.vue";
import loadComponent from "./loadComponent.vue";
import axios from "axios";
import cartItemComponent from "./mainComponents/cartItemComponent.vue";

export default {
    name: 'main',
    data: function () {
        return {
            itemsApiData: {},
            basketItem: {},
            loadFlag: true
        }
    },
    components: {
        cartItemComponent,
        headerComp,
        bodyComponent,
        footerComponent,
        loadComponent
    },
    created() {
        this.getItems()
        // this.createBasket()
    },
    mounted() {
        this.createBasket()
    },
    methods: {
        productsSync:  function () {

        },
        getItems() {
            axios({
                method: 'post',
                url: '/api/item/list/get'
            })
                .then(response => (this.itemsApiData = response.data)).then(() => {
                this.createBasket()
                this.loadFlag=false
            }).catch(function (error) {
                console.log(error)
            })
        },

        createBasket() {
            let basket = [];
            for (let i = 0; i < this.itemsApiData.length; i++) {
                for (let j = 0; j < localStorage.length; j++) {
                    if (this.itemsApiData[i]['id'] == localStorage.key(j)) {
                        basket.push(this.itemsApiData[i])
                    }
                }
            }
            this.basketItem = basket
        }
    }
}
</script>

<template>
    <header-comp :count-products="basketItem.length"/>
    <body-component
        v-if="!loadFlag"
        :itemsApiData="itemsApiData"
        :basketItem="basketItem"
    />
    <load-component
    v-if="loadFlag"
    />

    <footer-component/>
</template>

<style scoped>
body{
    margin-top: 100px;
}
</style>
