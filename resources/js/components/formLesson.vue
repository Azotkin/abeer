<script>
import Paginate from "vuejs-paginate-next";
import axios from "axios";
import timeTableComp from './timeTableComp.vue';
export default {
    data:function(){
        return{
            currentPage:1,
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
        lessonsApiData:Array,
        tabs:Boolean
    },
    computed:{
        pagesCount(){
            if (this.lessonsApiData)
                return Math.ceil(this.lessonsApiData.length/this.paginationItemsPerPage)
        }
    },
    watch:{
        lessonsApiData: function (items) {
            if (items.length > 0){
              this.changePage(1)
            }
        }
    },
    mounted() {


    },
    methods:{
        changePage(pageNum){
             let newArray =   Object.entries(Object.assign({},  this.lessonsApiData));
             this.currentPage = pageNum;
             this.paginationOffset=(this.paginationItemsPerPage*pageNum)-this.paginationItemsPerPage;
             this.coinsArray = newArray.splice(this.paginationOffset, this.paginationItemsPerPage);
             window.scroll(0,0)
        }
    },



}

</script>

<template>
    <div class="formLesson" v-if="!tabs">
        <table class="table caption-top">
            <thead>
            <tr>
                <th scope="col">Дата</th>
                <th scope="col">Предмет</th>
            </tr>
            </thead>
            <tbody>

            <time-table-comp v-for="item in coinsArray"
                :item="item[1]"
                v-model="currentPage"
            />
            </tbody>
        </table>
    <nav id="pagination">
    <Paginate
        v-if="!tabs"
        v-model="currentPage"
        :page-count="pagesCount"
        :click-handler="changePage"
        :prev-text="'пред'"
        :next-text="'след'"
        :container-class="'pagination'">
    </Paginate>
    </nav>
    </div>
</template>

<style>
.pagination{

}
formLesson{    background-color: #212529;
}
</style>
