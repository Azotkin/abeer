<script>
export default {
    data: function () {
        return {}
    },
    props: {
        countProducts: Number
    },
    computed: {},
    methods:{
        push(number){
            this.$root.dataSync['tabs']=number
        }
    }
}
</script>

<template>
    <header class="navbar-area">
        <nav class="navbar navbar-expand-lg">
            <div class="container nav-container">
                <div class="responsive-mobile-menu">
                    <button class="menu toggle-btn d-block d-lg-none" data-target="#themefie_main_menu" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-left"></span>
                        <span class="icon-right"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="themefie_main_menu">
                    <ul class="navbar-nav menu-open">
                        <li>
                            <a @click="push(0)">О НАС</a>
                        </li>
                        <li>
                            <a href="#">КОНТАКТЫ</a>
                        </li>
                    </ul>
                </div>
                <div class="logo">
                    <a class="main-logo" href="home-1.html"><img src="assets/img/logo.png" alt="img"></a>
                </div>
                <div class="nav-right-part nav-right-part-mobile">
                    <ul>
                        <li><a class="search" href="#"><i class="ri-search-line"></i></a>
                        </li>
                        <li class="phone-contact d-md-block d-none"><i class="ri-phone-fill float-start"></i>
                            +997 509 153 849
                        </li>
                        <li class="menu-cart" @click="push(1)">Корзина<span>{{countProducts}}</span></li>
                        <li>49.50 $</li>
                    </ul>
                </div>
                <div class="nav-right-part nav-right-part-desktop">
                    <ul>
                        <li><a class="search" href="#"><i class="ri-search-line"></i></a>
                        </li>
                        <li class="phone-contact"><i class="ri-phone-fill float-start"></i>
                            +7(964)-522-2442
                        </li>
                        <li class="menu-cart" data-bs-toggle="modal"
                            data-bs-target='#basketModal' @click="push(1)">Корзина <span>{{countProducts}}</span></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

</template>

<style scoped>
@font-face {
    font-family: "New";
}

</style>
