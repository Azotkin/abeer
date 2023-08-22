<script>
import Paginate from "vuejs-paginate-next";
import axios from "axios";
import timeTableComp from './timeTableComp.vue';
export default {
    data:function(){
        return{
            pagesCount:0,
            page:1,
            paginationOffset:0,
            paginationItemsPerPage:5,
            coinsArray:[]
        }
    },
    components:{
        timeTableComp,
        Paginate
    },
    props:{
        lessonsApiData:Array
    },
    computed:{
        pagesCount(){
            return 0;
            // return Math.ceil(this.lessonsApiData.length/this.paginationItemsPerPage)
        }
    },
    methods:{
        changePage(pageNum){
                let newArray=this.array;
                this.page = pageNum;
                this.paginationOffset=(this.paginationItemsPerPage*pageNum)-this.paginationItemsPerPage;
                this.coinsArray = newArray.splice(this.paginationOffset, this.paginationItemsPerPage);
                window.scroll(0,0)
        }
    },



}

</script>

<template>
        <table class="table caption-top">
            <caption>Список студентов</caption>
            <thead>
            <tr>

                <th scope="col">Дата</th>
                <th scope="col">Предмет</th>

            </tr>
            </thead>
            <tbody>

            <time-table-comp v-for="item in lessonsApiData"
            :item="item"
            v-model="page"
            />
            </tbody>
        </table>
    <nav id="pagination">
<!--        page: {{ page}}<br>-->
<!--        pagination_offset: {{ paginationOffset }}<br>-->
<!--        pagination_items_per_page:{{paginationItemsPerPage}}<br>-->
<!--        pagination_items_total:{{array.length}}<br>-->
<!--        pagesCount:{{pagesCount}}-->
    <Paginate
        v-model="page"
        :page-count="pagesCount"
        :click-handler="changePage"
        :prev-text="'Prev'"
        :next-text="'Next'"
        :container-class="'pagination'">
    </Paginate>
    </nav>
</template>

<style scoped>

</style>
