<template>
    <div class="container">
        <div class="large-12 medium-12 small-12 cell">
            <label>Загрузите фото товара
                <input class="form-control" type="file" id="file" ref="file" v-on:change="handleFileUpload()"/>
            </label>
        </div>
    </div>
    <div class="image">
        <img v-if="path!==''" :src="path" class="image-size">
    </div>

</template>

<script>
import axios from "axios";

export default {
    data(){
        return {
            file: '',
            path:''
        }
    },
    emits:
        [
            'getAwayPath'
        ],
    methods: {
        submitFile(){
            let formData = new FormData();
            formData.append('file', this.file);
            axios.post( '/api/upload/image',
                formData,
                {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }
            ).then(response => (this.test(response))).catch(function (error) {
                console.log(error)

            });

        },
        handleFileUpload(){
            this.file = this.$refs.file.files[0];
            this.submitFile();

        },
        test(response){
            this.path=response.data
            this.$emit('getAwayPath',this.path);
        }
    },
    computed:{
    }
}
</script>
<style>
.image-size{
    width: 400px;
    height: 200px;
}
</style>
