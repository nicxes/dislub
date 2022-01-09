<template>
  <section class="px-4 md:px-6 pb-20">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-9">
      <div class="Search relative col-span-2">
        <input v-model="search" type="search" placeholder="Buscá cualquier producto" class="w-full rounded-2xl border-2 border-line py-3 pl-16 pr-6 text-input-placeholder-color bg-[#FCFCFC] focus:shadow-none focus:outline-none focus:ring-0 focus:border-line transition duration-300 ease-out">
      </div>
    </div>

    <ul class="grid grid-cols-2 md:grid-cols-7 gap-y-4 gap-x-5 md:gap-6">
      <CardProduct
        v-for="(product, i) in filteredProducts"
        :key="i"
        :product="product"
        :image="`images/products/${randomInt(1, 4)}.png`"
      />
    </ul>
  </section>
</template>

<script>
export default {
  layout: 'dashboard',
  data () {
    return {
      products: [],
      search: '',
    }
  },
  computed: {
    filteredProducts () {
      return this.products.filter((product) => {
        return product.name.toLowerCase().match(this.search.toLowerCase())
      })
    },
  },
  mounted () {
    this.getProducts()
    this.search = this.$router.currentRoute.params.search
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

<style scoped>
  .Search::before {
    content: '';
    position: absolute;
    left: 24px;
    top: 15px;
    z-index: 10;

    height: 24px;
    width: 24px;

    background: url('/images/icons/search.svg') no-repeat center center;
  }
</style>
