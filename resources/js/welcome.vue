<template>
    <div class="container">
        <Students/>
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
import Students from './components/Students.vue'

export default {
    data: function () {
        return {
            lessonsApiData:[],

        }
    },
    components: {
        formLesson,
        modalWindow,
        Students
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
