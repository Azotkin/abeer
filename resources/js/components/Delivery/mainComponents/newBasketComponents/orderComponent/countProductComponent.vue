<script>
export default {
    data: function () {
        return {
            count: 1
        }
    },
    mounted() {

    },
    created() {
        this.count = localStorage[this.id]
        this.$emit('catchCount', this.count)
    },
    props: {
        id: Number
    },
    emits: [
        'catchCount'
    ],
    methods: {
        countMinus() {
            if (this.count <= 1) {
                this.count = 1
            } else {
                this.count--
                this.getAwayCount()
            }
        },
        countPlus() {
            this.count++;
            this.getAwayCount()

        },
        getAwayCount() {
            this.$emit('catchCount', this.count)
        }
    },
    computed: {
    },
    watch: {}
}
</script>

<template>
    <td class="table-quantity">
        <form>
            <div class="quantity buttons_added">
                <input type="button" value="-" class="minus" @click="countMinus">
                <input v-model="count"  step="1" name="quantity">
                <input type="button" value="+" class="plus" @click="countPlus">
            </div>
        </form>
    </td>

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

.number-text {
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
