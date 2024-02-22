<script>

export default {
    components: {},
    data: function () {
        return {}
    },
    name: "addToBasket",
    props: {
        item: Object,
        isBasket: Boolean,
        count:0
    },
    methods: {
        addToLocalStorage(id, count) {
            if(count===undefined){
                count=1
            }
            localStorage[id]=count
            // localStorage[this.item['id']] = this.item['id']
            this.$root.getItems()
        },
        deleteLocalStorage() {
            localStorage.removeItem(this.item['id'])
            this.$root.getItems()
        }
    }
}



</script>

<template>
    <button class="btn btn-secondary">
        <span @click="addToLocalStorage(item['id'])" v-if="!isBasket"> Добавить </span>
        <span @click.prevent="deleteLocalStorage" v-if="isBasket">Удалить</span>
    </button>

</template>

<style scoped>

</style>
