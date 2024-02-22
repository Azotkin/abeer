<script>
export default
{
    data: function () {
        return {}
    },
    props:{
        id:Number
    },
    emits:[
        'changeItem'
    ],
    methods:{

    }
}
</script>

<template>
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Заголовок модального окна</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>
                <div class="modal-body">
                    <label for="test">{{id}}</label>

                    <input id="test" type="text" v-model="test">
                    <button @click="postSubmit">Тестирую</button>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                    <button type="button" class="btn btn-primary">Отправить</button>
                </div>
            </div>
    </div>
    </div>
</template>

<style scoped>

</style>
