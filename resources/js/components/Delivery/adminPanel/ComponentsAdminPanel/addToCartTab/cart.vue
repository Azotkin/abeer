<script>
import addToCart from "@/components/Delivery/adminPanel/ComponentsAdminPanel/addToCartTab/addToCart.vue";
import axios from "axios"
import modalWindow from "./modalWindow.vue"

export default {
    data: function () {
        return {
            responseFromServer:''
        }
    },
    components: {
        modalWindow
    },
    props: {
        item: Object
    },
    methods:{
        postSubmit() {
            axios({
                method: 'post',
                url: 'api/change/item',
                data: {
                    id: this.item["id"],
                    product_name: this.item['product_name'],
                    price: this.item['price'],
                    category: this.item['category'],
                    description: this.item['description']
                }
            })
                .then(response => (this.responseFromServer = response.data))
                .catch(error => (this.responseFromServer = error.response.data.message));

        },
        deletePost(){
            axios({
                method:'post',
                url:'api/delete/item',
                data:{
                    id:this.item['id']
                }
            }).then(response=>(this.responseFromServer = response.data))
                .catch(error=>(this.responseFromServer = error.response.data.message));
        }
    }
}

</script>

<template>
    <div v-if="responseFromServer!==''">
        <h1>{{responseFromServer}}</h1>
    </div>
    <div class=" col-4 p-1">
    <form class="form-control">
        <input class="form-control" v-model="item['product_name']">
        <input class="form-control" v-model="item['price']">
        <input class="form-control" v-model="item['description']">
        <select class="form-select" aria-label="Product" v-model="item['category']">
            <option selected>Выберите категорию товара</option>
            <option value="Напитки">Напитки</option>
            <option value="Закуски">Закуски</option>
        </select>
         <button class="btn btn-warning" @click="postSubmit" type="button">Изменить</button>
         <button class="btn btn-danger" @click="deletePost" type="button">Удалить</button>
        <div>
            <div class="thumb">
                <img :src="item.image_path" :alt="item.price">
            </div>
        </div>
        </form>
    </div>
</template>

<style scoped>
.background{
    border-radius: 10px 10px 10px;
    margin: 5px;
    max-height: 300px;
    max-width: 300px;
}
img{
    height: 90px;
    width: 90px;
    border-radius: 50px;
}
</style>
