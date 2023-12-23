<script>
import youCartsComponent from './youCartsComponent.vue';
export default {
  components: {
      youCartsComponent
  },
  data: function () {
    return {}
  },
  props: {
      basket:Object
  },
  methods: {},
  computed: {
      basketLength(){
          return localStorage.length
      }
  }
}
</script>

<template>
  <div class="col-md-5 col-lg-4 order-md-last">
    <h4 class="d-flex justify-content-between align-items-center mb-3">
      <span class="text-primary">Ваша корзина</span>
      <span class="badge bg-primary rounded-pill">{{basketLength}}</span>
    </h4>
    <ul class="list-group mb-3">
      <you-carts-component
        v-for="item in basket"
        :basketItem="item"
      />
      <li class="list-group-item d-flex justify-content-between">
        <span>Total (USD)</span>
        <strong>$20</strong>
      </li>
    </ul>

    <form class="card p-2">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Promo code">
        <button type="submit" class="btn btn-secondary">Redeem</button>
      </div>
    </form>
  </div>
</template>

<style scoped>

</style>
