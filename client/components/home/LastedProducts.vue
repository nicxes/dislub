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
      <NuxtLink to="/products" class="text-background font-semibold bg-primary hover:bg-[#184158] rounded-[40px] px-4 py-4 w-96 block text-center transition duration-300 ease-out">
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
        slidesPerView: 2,
        spaceBetween: 24,
        preventClicks: false,
        preventClicksPropagation: false,
        touchStartPreventDefault: false,
        breakpoints: {
          768: {
            slidesPerView: 4,
          },
          1024: {
            slidesPerView: 6,
          },
        },
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

<style scoped>
  .swiper-slide {
    height: auto;
    max-height: 270px;
  }
</style>
