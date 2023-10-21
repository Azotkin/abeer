<script>
import calendar from "./calendar.vue";
export default {
    data: function () {
        return {

        }
    },
    props:{
      items:Object
    },
    components:{
        calendar
    }


}
</script>

<template>


<calendar
:items="items"/>

</template>

<style>

</style>
