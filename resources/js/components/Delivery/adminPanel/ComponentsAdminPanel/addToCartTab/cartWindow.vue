<script>

import cart from "@/components/Delivery/adminPanel/ComponentsAdminPanel/addToCartTab/cart.vue";
export default {
    data: function () {
        return {
            item_per_page:7,
            pagination_offset:0,
            paginationArray:[]
        }
    },
    components: {
        cart
    },
    props: {
        item: Object
    },
    methods:{
        changePage(pageNumber) {
            this.pagination_offset = (this.item_per_page * pageNumber) - this.item_per_page
        }
    },
    computed:{
        get(){
            for(let i = this.pagination_offset; i<this.pagination_offset+this.item_per_page; i++ ){
                this.paginationArray.push(this.$root.adminX.carts[i])
            }
            this.$root.adminX.pagination = this.paginationArray
            alert('изменилось')
            return this.paginationArray
        }
    }
}
</script>

<template>
    <div class="container-xl text-center">
        <div class="row justify-content-center">
            <cart
                v-for="item in item.carts"
                :item="item"
            />
        </div>
    </div>
</template>

<style scoped>

</style>
