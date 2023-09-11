<script>
import axios from "axios";

export default {
    data: function () {
        return {
            lessonName: '',
            classRoom: '',
            date: '',
            note: '',
            responseFromServer: '',
            stack: 0
        }
    },
    emits:
        [
            'updateLessonList'
        ],

    methods: {
        postSubmit() {
            axios({
                method: 'post',
                url: 'api/lessons/item/save',
                data: {
                    lessonName: this.lessonName,
                    classRoom: this.classRoom,
                    date: this.date,
                    note: this.note

                }
            })
                .then(response => (this.responseFromServer = response.data))
                .catch(error => (this.responseFromServer = error.response.data.message));
            this.$emit('updateLessonList')

        }
    },
    watch: {
        responseFromServer: function () {
            this.stack++
        }
    }

}
</script>

<template>
    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Добавить занятия
    </button>

    <!-- Модальное окно -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">

                    <h1 class="modal-title fs-5" id="exampleModalLabel">Добавить задание</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <p class="response">{{ responseFromServer }}</p>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Предмет</label>
                            <input type="text" name="lessonName" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp" v-model="lessonName">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Аудитория</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" v-model="classRoom">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Дата</label>
                            <input type="datetime-local" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp" v-model="date">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Примечание</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                   v-model="note">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Один раз
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Еженедельно
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Каждые две недели
                            </label>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                    <button @click="postSubmit" type="button" class="btn btn-primary">Сохранить изменения</button>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.response {
    color: #b13a47;
}
</style>
