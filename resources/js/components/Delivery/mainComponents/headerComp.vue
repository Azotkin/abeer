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
    <div class="header px-3 py-2 border-bottom mb-3">
        <div class="container d-flex flex-wrap justify-content-center">
            <div class="logo">
                <img class="logo_delivery" src="../../../../../public/img/devilerer_logo.png"/>
                </div>
            <div class="d-flex align-items-center">
                <h1 class="rail">Железная доставка</h1>
            </div>
                <form class="d-flex align-items-center col-12 col-lg-auto mb-2 mb-lg-0 me-lg-auto" role="search">
                <input type="search" class="form-control" placeholder="Помогу найти..." aria-label="Search">
            </form>

            <div class="text-end">
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Добавление товара
                </button>
                <button type="button"
                        class="basket-btn m-3 btn" data-bs-toggle="modal"
                        data-bs-target='#basketModal'><img src="../../../../../storage/app/public/basketIcon.png" alt="basket"> <span
                    class="badge text-bg-secondary">{{ ' ' + countProducts }}</span></button>
            </div>
        </div>
    </div>


</template>

<style scoped>
.header{
    background-color: #d1c3b3;

}
.rail{
    font-family: "New";
    color: whitesmoke;
stroke: #0b2e13;
}
.basket-btn{
    position: fixed;
    z-index: 50;
    margin: 10px;
}
.border-bottom{
    //position: fixed;
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
.logo_delivery{
    height: 150px;
    width: 190px    ;
}
@font-face {
    font-family: "New";
}

</style>
