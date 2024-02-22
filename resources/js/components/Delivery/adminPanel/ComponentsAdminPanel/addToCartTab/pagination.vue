<script>


export default {

    data: function () {
        return {
            item_per_page: 7,
            pagination_offset: 0
        }
    },
    props:{
      items:Object
    },
    methods: {
        changePage(pageNumber) {
            this.pagination_offset = (this.item_per_page * pageNumber) - this.item_per_page
        }
    },
    computed: {
        get(){
            let array=[];
            for(let i = this.pagination_offset; i<this.pagination_offset+this.item_per_page; i++ ){
                array.push(this.$root.adminX.carts[i])
            }
            this.$root.adminX.pagination = array
            return array
        },
        pageCount() {
            let array=[];
            for(let i = 0; i>Math.ceil(this.items.length / this.item_per_page); i++){
                array.push(i)
                console.log(i)
            }
            return array
        }
    }
}
</script>

<template>
    <button v-for="number in pageCount">{{number}}</button>

    <button @click="changePage(1)">1</button>
    <button @click="changePage(2)">2</button>
    <button @click="changePage(3)">3</button>
</template>

<style scoped>

</style>
