<script>
import uploadImage from "./uploadImage/uploadImage.vue";
import axios from "axios";

export default {
    data: function () {
        return {
            productName: '',
            description: '',
            price: 0,
            category: '',
            imagePath: '',
            responseFromServer: ''
        }
    },
    components: {
        uploadImage
    },

    methods: {
        postSubmit() {
            axios({
                method: 'post',
                url: 'api/product/item/save',
                data: {
                    productName: this.productName,
                    description: this.description,
                    price: this.price,
                    category: this.category,
                    imagePath: this.imagePath
                }
            })
                .then(response => (this.responseFromServer = response.data))
                .catch(error => (this.responseFromServer = error.response.data.message));

        },
        getPath(data) {
            this.imagePath=data
        }
    }

}

</script>

<template>


    <!-- Модальное окно -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="m-5">
                    <div class="mb-3">
                        {{ responseFromServer }}
                    </div>
                    <div class="mb-3">
                        <label for="product-name">Введите название товара</label>
                        <input class="form-control" type="text" name="product-name" id="product-name"
                               v-model="productName">
                    </div>
                    <div class="mb-3">
                        <label for="description">Введите описание товара</label>
                        <input class="form-control" type="text" name="description" id="description"
                               v-model="description">
                    </div>
                    <div class="mb-3">
                        <label for="price">Введите цену товара</label>
                        <input class="form-control" type="text" name="price" id="price" v-model="price">
                    </div>
                    <div class="mb-3">
                        <select class="form-select" aria-label="Product" v-model="category">
                            <option selected>Выберите категорию товара</option>
                            <option value="Напитки">Напитки</option>
                            <option value="Закуски">Закуски</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <upload-image
                            @getAwayPath="getPath(this.imagePath=$event)"
                        />
                    </div>

                    <button type="button" class="p-1 btn btn-primary" @click="postSubmit">Отправить</button>
                </form>
            </div>
        </div>
    </div>

</template>

<style scoped>

</style>
