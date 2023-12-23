<script>
export default {
    data: function () {
        return {
            count:1
        }
    },
    created(){
this.count=localStorage[this.id]
    },
    props:{
        id: Number
    },
    emits:[
        'catchCount'
    ],
    methods:{
        countMinus(){
            if(this.count<=1){
                this.count=1
            }else{
                this.count--
                this.getAwayCount()
            }
        },
        countPlus(){
            this.count++;
            this.getAwayCount()
        },
        getAwayCount(){
            this.$emit('catchCount', this.count)
        }
    },
    computed:{
        countToLocalStorage(){
            localStorage[this.id]=this.count
return localStorage[this.id]
        }
    }
}
</script>

<template>
    <div class="number" data-step="1" data-min="1" data-max="100">

        <input  v-model="count" class="number-text" type="text" name="count">

        <div @click="countMinus" href="#" class="number-minus">−</div>

        <div @click="countPlus" href="#" class="number-plus" >+</div>

    </div>
</template>

<style scoped>
.number {
    user-select: none;
    position: relative;
    text-align: left;
    padding: 0;
    width: 140px;
    border: 1px solid #ddd;
    display: inline-block;
}
.number-minus, .number-plus {
    position: absolute;
    top: 0;
    width: 40px;
    height: 32px;
    line-height: 32px;
    display: block;
    background: #faf4f2;
    font-size: 20px;
    font-weight: 600;
    text-align: center;
    font-family: arial;
    color: #3e1e02;
    text-decoration: none;
}
.number-minus {
    left: 0;
    border-right: 1px solid #ddd;
}
.number-plus {
    right: 0;
    border-left: 1px solid #ddd;
}
.number-minus:hover, .number-plus:hover {
    background: #fffcfb;
}
.number-minus:active, .number-plus:active {
    background: #e8e4e2;
}
.number-text{
    display: inline-block;
    font-size: 14px;
    color: #000;
    line-height: 32px;
    height: 32px;
    padding: 0;
    margin: 0 0 0 42px;
    background: #fff;
    outline: none;
    border: none;
    width: 57px;
    text-align: center;
}
</style>
