<script>
export default {
    data:function(){
        return{
            opener:false
        }
    },
    props:{
    item:Object,
        getTableTimeList() {
        }

    }
}
</script>

<template>
    <div class="container align-items-start">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-7 g-3">



        </div>

    </div>


    <tr>

        <td>{{item.datetime}}</td>
        <td>{{ item.lesson_name+' аудитория №'+item.class_number }}</td>
        <div @click="opener=!opener"><img src="../../../public/img/arrow_right.png" height="40" width="40" v-if="!opener"/></div>
        <div @click="opener=!opener"><img src="../../../public/img/arrow.png" height="40" width="40" v-if="opener"/></div>
    </tr>
    <tr v-if="opener">

        <td><h4>{{'примечание '+item.info}}</h4></td>
        <td><button class="btn btn-primary">Редактировать</button></td>

    </tr>
</template>

<style scoped>
td{
    color: grey;
}
</style>
