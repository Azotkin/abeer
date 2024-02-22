<script>
import headerComp from './mainComponents/headerComp.vue'
import bodyComponent from "./mainComponents/bodyComponent.vue";
import footerComponent from "./mainComponents/footerComponent.vue";
import loadComponent from "./loadComponent.vue";
import axios from "axios";
import dataSync from "./data";


export default {
    name: 'main',
    data: function () {
        return {
            loadFlag: true,
            dataSync: dataSync,
        }
    },
    components: {
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
        getItems() {
            axios({
                method: 'post',
                url: '/api/item/list/get'
            })
                .then(response => (this.dataSync['cartItemComponent'] = response.data)).then(() => {
                this.createBasket()
                this.loadFlag = false
            }).catch(function (error) {
                console.log(error)
            })
        },

        createBasket() {
            let basket = [];
            for (let i = 0; i < this.dataSync['cartItemComponent'].length; i++) {
                for (let j = 0; j < localStorage.length; j++) {
                    if (this.dataSync['cartItemComponent'][i]['id'] == localStorage.key(j)) {
                        basket.push(this.dataSync['cartItemComponent'][i])
                    }
                }
            }
            this.dataSync['basket'] = basket,
                this.basketItem = basket
        }
    },
    provide(){
        return{
            dataSync: this.dataSync
        }
    },
    computed: {},

}
</script>

<template>
    <header-comp
        v-if="!loadFlag"
        :count-products="basketItem.length"
    />
    <body-component
        v-if="!loadFlag"
        :itemsApiData="dataSync['cartItemComponent']"
        :basketItem="dataSync['basket']"
        :totalPrice="dataSync['totalPrice']"
        :data="dataSync"
    />
    <load-component
        v-if="loadFlag"
    />

    <footer-component/>
</template>

<style scoped>
body {
    margin-top: 70px;
}
</style>
