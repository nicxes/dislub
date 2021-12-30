<template>
  <section class="px-6 pb-20">
    <ul class="grid grid-cols-2 md:grid-cols-7 gap-y-4 gap-x-5 md:gap-6">
      <CardProduct v-for="(product, i) in products" :key="i" :name="product.name" :image="`images/products/${randomInt(1, 4)}.png`" />
    </ul>
  </section>
</template>

<script>
export default {
  layout: 'dashboard',
  data () {
    return {
      products: [],
    }
  },
  mounted () {
    this.getProducts()
  },
  methods: {
    getProducts () {
      this.$axios.$get('/products').then((res) => {
        this.products = res.data
      }).catch((err) => {
        console.log(err)
      })
    },
    randomInt (min, max) {
      return Math.floor(Math.random() * (max - min + 1) + min)
    },
  },
}
</script>
