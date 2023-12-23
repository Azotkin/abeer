<script>
import headerComp from './mainComponents/headerComp.vue'
import bodyComponent from "./mainComponents/bodyComponent.vue";
import footerComponent from "./mainComponents/footerComponent.vue";
import loadComponent from "./loadComponent.vue";
import axios from "axios";
import cartItemComponent from "./mainComponents/cartItemComponent.vue";
import dataSync from "./data";

export default {
    name: 'main',
    data: function () {
        return {
            itemsApiData: {},
            basketItem: {},
            loadFlag: true,
            dataSync: dataSync,
            routes: {
                '/circle': loadComponent
            }
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
        productsSync: function (count, id) {
            let totalPrice
            axios({
                methods: 'post',
                url: '/api/basket/get/totalprice',
                data: {
                    count: count,
                    id: id
                }
            }).then(response => (totalPrice = response)).catch(function (error) {
                console.log(error)
            })
            return this.dataSync['basketTotalPrice'] = totalPrice
        },
        getItems() {
            axios({
                method: 'post',
                url: '/api/item/list/get'
            })
                .then(response => (this.itemsApiData = response.data)).then(() => {
                this.createBasket()
                this.loadFlag = false
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
    },
    computed: {
        vueComponent() {
            if (document.location.pathname == '/123') {
                return loadComponent
            } else {
                return bodyComponent
            }
        }
    }
}
</script>

<template>
    <header-comp
        v-if="!loadFlag"
        :count-products="basketItem.length"
    />
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
body {
    margin-top: 100px;
}
</style>
