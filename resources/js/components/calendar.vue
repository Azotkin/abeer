<script>
import cartDay from './cartDay.vue'
export default {
    data: function () {
        return {
            month: new Date().getMonth(),
            year: new Date().getFullYear(),
            dFirstMonth: '1',
            day: ["ПН", "ВТ", "СР", "ЧТ", "ПТ", "СБ", "ВС"],
            monthes: ["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь"],
            date: new Date(),
            days:[]
        }
    },
    components:{
        cartDay
    },
    props: {
        items: Object,
        lessonsApiData: Object
    },

    methods: {
        calendar: function () {
            // let dlast = new Date(this.year, this.month + 1, 0).getDate();
            let days = [];
            let week = 0;
            days[week] = [];
            let dlast = new Date(this.year, this.month + 1, 0).getDate();
            for (let i = 1; i <= dlast; i++) {
                if (new Date(this.year, this.month, i).getDay() != this.dFirstMonth) {
                    let a = {index: i};
                    days[week].push(a);
                } else {
                    week++;
                    days[week] = [];
                    let a = {index: i};
                    days[week].push(a);
                }
            }
            if (days[0].length > 0) {
                for (let i = days[0].length; i < 7; i++) {
                    days[0].unshift('');
                }
            }
            // debugger
            // this.dayChange;
            this.days=days
            return days;

        },
        decrease: function () {
            this.month--;
            if (this.month < 0) {
                this.month = 12;
                this.month--;
                this.year--;
            }
        },
        increase: function () {
            this.month++;
            if (this.month > 11) {
                this.month = -1;
                this.month++;
                this.year++;
            }
        },
        compareDay: function (dayString) {
            let dif = dayString.length - 9

            return dayString.slice(0, dayString.length-9)
        }
    },
    computed: {}
}


</script>

<template>



<!--<cart-day-->
<!--    v-for="(week, day) in days"-->
<!--    :week="week"-->
<!--/>-->

    <table class="calendar">
        <thead>
        <tr>
            <td>
                <button class="btn btn-dark" v-on:click="decrease">назад</button>
            </td>
            <td colspan="5" class="month-year"> {{ monthes[month] }} {{ year }}</td>
            <td>
                <button class="btn btn-dark" v-on:click="increase">вперед</button>
            </td>
        </tr>
        <tr>
            <td v-for="d in day">{{ d }}</td>
        </tr>
        </thead>
        <tbody>
        <tr v-for="week in calendar()">
            <td v-for="(day, index) in week">
                <cart-day
                    :week="day.index"
                />
            </td>
        </tr>
        </tbody>
    </table>


</template>

<style>
.calendar {
    margin: 50px;
    width: 1000px;
    height: 700px;
    background-color: #292e2f;
    color: #bbbbbb;
    border-radius: 5px 5px 5px 5px;
    //margin: 20px;
}

.month-year {
    color: #a60011;
}

.calendar:hover {
    margin: 50px;
    border-radius: 20px 20px 20px 20px;
}
</style>
