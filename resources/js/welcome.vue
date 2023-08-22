<template>
    <div class="container">
        <form-lesson
            :lessons-api-data="lessonsApiData"
        />
        <modal-window/>


    </div>
</template>

<script>
import formLesson from './components/formLesson.vue'
import modalWindow from './components/modalWindow.vue'
import axios from "axios";

export default {
    data: function () {
        return {
            lessonsApiData:[],

        }
    },
    components: {
        formLesson,
        modalWindow
    },
    created() {
        this.getTableTimeList();
    },
    methods:{
        getTableTimeList(){
            axios({
                method:'post',
                url:'/api/lessons/list/get'
            })
                .then(response => (this.lessonsApiData= response.data)).catch(function(error){
                console.log(error)
            })
        },
    }
}

</script>

<style>


</style>
