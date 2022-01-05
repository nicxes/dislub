<template>
  <section class="py-12">
    <h3 class="text-darked text-2xl md:text-3xl font-bold md:text-center mb-4 tracking-[1px]">Productos</h3>

    <div class="mb-6">
      <swiper ref="carousel" :options="swiperOptions">
        <swiper-slide v-for="(product, i) in products" :key="i">
          <CardProduct :product="product" image="/images/products/1.png" />
        </swiper-slide>

        <div slot="pagination" class="swiper-pagination" />
      </swiper>
    </div>

    <div class="flex justify-center">
      <NuxtLink to="/products" class="text-background font-semibold bg-primary rounded-[40px] px-4 py-4 w-96 block text-center">
        Ver todos los productos
      </NuxtLink>
    </div>
  </section>
</template>

<script>
export default {
  data () {
    return {
      products: [],
      swiperOptions: {
        slidesPerView: 5,
        spaceBetween: 24,
        preventClicks: false,
        preventClicksPropagation: false,
        touchStartPreventDefault: false,
      },
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
  },
}
</script>
