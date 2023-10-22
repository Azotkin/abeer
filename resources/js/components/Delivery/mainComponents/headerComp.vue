<script>
export default {
    data: function () {
        return {}
    },
    props: {
        countProducts: Number
    },
    computed: {}
}
</script>

<template>
    <div class="px-3 py-2 border-bottom mb-3">
        <div class="container d-flex flex-wrap justify-content-center">
            <form class="col-12 col-lg-auto mb-2 mb-lg-0 me-lg-auto" role="search">
                <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
            </form>

            <div class="text-end">
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Добавление товара
                </button>
                <button type="button"
                        class="m-3 btn" data-bs-toggle="modal"
                        data-bs-target='#basketModal'>Корзина <span
                    class="badge text-bg-secondary">{{ ' ' + countProducts }}</span></button>
            </div>
        </div>
    </div>
    <!--    -------------------------------------------------------------->


</template>

<style scoped>
.border-bottom{
    position: fixed;
    left: 0;
    top: 0;
    z-index: 50;
}
.btn {
    background-color: #e3e2e2;
    color: #f3883b;
}

.btn:hover {
    background-color: #f3883b;
    color: #e3e2e2;
}
</style>
