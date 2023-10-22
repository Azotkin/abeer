<template>
    <div class="container">
        <div class="large-12 medium-12 small-12 cell">
            <label>File
                <input type="file" id="file" ref="file" v-on:change="handleFileUpload()"/>
            </label>
            <button class="btn btn-dark" v-on:click="submitFile()">Submit</button>
        </div>
    </div>
<div class="image">
<img v-if="responseF!==''" :src="responseF" class="image-size">
</div>

</template>

<script>
import axios from "axios";

export default {
    data(){
        return {
            file: '',
            responseF:'',
            path:'public'
        }
    },

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
            ).then(response => (this.responseF = response.data)).catch(function (error) {
                console.log(error)
            });

        },
        handleFileUpload(){
            this.file = this.$refs.file.files[0];
        }
    }
}
</script>
<style>
.image-size{
    width: 400px;
    height: 200px;
}
</style>
