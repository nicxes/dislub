<template>
  <section class="py-12" :style="`max-width: ${w}px`">
    <h3 v-if="title" class="text-darked text-2xl md:text-3xl font-bold md:text-center mb-4 tracking-[1px]">Productos</h3>
    <h5 v-else class="text-[#6E7191] text-[13px] md:text-base font-semibold mb-4 text-center">Más productos similares:</h5>

    <div class="relative mb-6">
      <swiper ref="carousel" :options="swiperOptions">
        <swiper-slide v-for="(product, i) in products" :key="i">
          <CardProduct :product="product" image="/images/products/placeholder.svg" />
        </swiper-slide>

        <div slot="pagination" class="swiper-pagination" />
      </swiper>
    </div>

    <div v-if="button" class="flex justify-center">
      <NuxtLink to="/products" class="text-background font-semibold bg-primary hover:bg-[#184158] rounded-[40px] px-4 py-4 w-96 block text-center transition duration-300 ease-out">
        Ver todos los productos
      </NuxtLink>
    </div>
  </section>
</template>

<script>
export default {
  props: {
    w: {
      type: Number,
      default: 0,
    },
    title: {
      type: Boolean,
      default: true,
    },
    button: {
      type: Boolean,
      default: true,
    },
  },
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
            slidesPerView: 3,
          },
          1024: {
            slidesPerView: 4,
          },
          1440: {
            slidesPerView: 5,
          },
          1600: {
            slidesPerView: 6,
          },
          1920: {
            slidesPerView: 7,
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
      this.$axios.$get('/products/lasted').then((res) => {
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
