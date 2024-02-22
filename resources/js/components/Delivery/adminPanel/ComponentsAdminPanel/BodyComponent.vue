<script>
import headerAdminPanel from "./headerAdminPanel.vue"
import footerAdminPanel from "./footerAdminPanel.vue"
import itemEditWindow from "./addToCartTab/itemEditWindow.vue"
import siteManage from "./siteManager/siteManage.vue"
import orders from "./ordersTab/orders.vue"
export default {
    components: {
        headerAdminPanel,
        footerAdminPanel,
        itemEditWindow,
        siteManage,
        orders
    },
    props: {
        data: Object
    },
    data: function () {
        return {
            component: itemEditWindow,
            currentTab:'test',
            tabs: ['itemEditWindow', 'siteManage', 'orders']
        }
    },
    computed:{
        currentTabComponent() {
            return this.tabs[this.data['tabStatus']]
        }
    }
}
</script>

<template>
    <header-admin-panel/>
<!--    динамический компонент-->
<keep-alive>
    <component
        :is="currentTabComponent"
        :item="data"
    ></component>
</keep-alive>
    <footerAdminPanel/>

</template>

<style scoped>

</style>
