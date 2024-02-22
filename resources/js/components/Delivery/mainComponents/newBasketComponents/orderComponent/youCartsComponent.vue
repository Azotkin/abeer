<script>

import countProductComponent from "./countProductComponent.vue";

export default {
    components: {
        countProductComponent
    },
    data: function () {
        return {
        totalPrice: this.item['price']
        }
    },
    props: {
        item:Object
    },
    emits:[
        'getFullTotalPrice'
    ],
    methods: {
        catchCount(count){
            localStorage[this.item['id']]=count;
            this.totalPrice= Number(this.item['price']) * count
            this.$root.dataSync['totalTotalPrice'] = Number(this.item['price']) * count //тут тестовый тоталпрайс
            this.$root.dataSync.totalPrice[this.item['id']]=this.totalPrice
            this.$emit('getFullTotalPrice')

        },
        deleteFromBasket(){
            localStorage.removeItem(this.item['id'])
            this.$root.getItems()
        }
    },

    computed: {
    }
}
</script>

<template>
    <tbody>
    <tr>
        <td class="table-close-btn"><a href="#"><i class="ri-close-line"></i></a></td>
        <th scope="row"><img src="assets/img/widget/01.png" alt="img"></th>
        <td colspan="2" class="item-name">
            <div class="details">
                <h5>{{ item['product_name'] }}</h5>
                <ul>
                </ul>
            </div>
        </td>
        <td>₽{{ item['price'] }}</td>
        <td class="table-quantity">
            <count-product-component
                :id="item['id']"
                v-on:catch-count="catchCount"
            />
        </td>
        <td><div>₽{{ totalPrice }}</div><div class="div"><button class="btn" @click="deleteFromBasket">Удалить</button></div></td>
    </tr>
    </tbody>




    <!--    --------------------------------------------------------------------------------------------------------------->
    <!--    <li class="list-group-item d-flex justify-content-between lh-sm">-->
    <!--        <div>-->
    <!--            <h6 class="my-0">{{basketItem['product_name']}}</h6>-->
    <!--&lt;!&ndash;            <small class="text-body-secondary">{{ basketItem['description'] }}</small>&ndash;&gt;-->
    <!--            <div class="count">-->
    <!--                <count-product-component-->
    <!--                    :id="basketItem['id']"-->
    <!--                    v-on:catch-count="catchCount"-->
    <!--                />-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <span class="text-body-secondary">&#x20bd{{basketItem['price']}}</span>-->
    <!--    </li>-->
</template>

<style scoped>

</style>
