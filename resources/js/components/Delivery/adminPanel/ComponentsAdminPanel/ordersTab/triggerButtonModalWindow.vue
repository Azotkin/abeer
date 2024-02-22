<script>

export default{
    data: function (){
        return{

        }
    },
    props:{
        id: Object
    },
    computed:{
        jsonId(){
            return '#'+this.id['id']

        }
    }
}
</script>

<template>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" :data-bs-target="jsonId">
        Заказ
    </button>
</template>

<style scoped>

</style>
