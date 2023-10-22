<script>
export default {
    data: function () {
        return {}
    },
    name: "deleteFromBasket",
    props:{
        id:Number
    },
    methods:{
        deleteFromBasket(id){
            localStorage.removeItem(id)
            this.$root.getItems()
        }
    }
}

</script>

<template>
<button class="btn" @click="deleteFromBasket(id)">удалить</button>
</template>

<style scoped>

</style>
