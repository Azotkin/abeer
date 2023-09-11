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
