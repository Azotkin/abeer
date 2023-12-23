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
    <button class="btn">
        <span @click="addToLocalStorage(item['id'])" v-if="!isBasket"> {{ this.item.price + ' &#8381' + '&#43' }}</span>
        <span @click.prevent="deleteLocalStorage" v-if="isBasket">Удалить</span>
    </button>

</template>

<style scoped>
.btn {
    background-color: #e3e2e2;
    color: #f3883b;
}

.btn:hover {
    background-color: #f3883b;
    color: #e3e2e2;
}
</style>
