<template>
  <section class="px-4 md:px-6 pb-56">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-2 md:gap-6 mb-4 md:mb-10">
      <h1 class="md:hidden text-2xl font-bold uppercase tracking-[1px]">
        {{ product.name }}
      </h1>

      <div class="image bg-[#FCFCFC] rounded-[36px] p-14 mb-3 md:mb-0">
        <img src="/images/products/5-full.png" alt="" class="mx-auto">
      </div>

      <div class="flex flex-col justify-between">
        <div>
          <h1 class="hidden md:block text-[32px] font-bold uppercase tracking-[1px] mb-6">
            {{ product.name }}
          </h1>

          <ul>
            <li class="mb-2">
              <h5 class="text-[#6E7191] text-[13px] md:text-base font-semibold">Categoría:</h5>
              <h6 class="md:text-lg">Lubricante semisintético</h6>
            </li>

            <li class="mb-2">
              <h5 class="text-[#6E7191] text-[13px] md:text-base font-semibold">Viscocidad:</h5>
              <h6 class="md:text-lg">XXXX</h6>
            </li>

            <li class="md:mb-2">
              <h5 class="text-[#6E7191] text-[13px] md:text-base font-semibold">Volumen (Lts.)</h5>
              <h6 class="md:text-lg">XXXX</h6>
            </li>
          </ul>
        </div>

        <div class="hidden md:block">
          <div class="bg-white py-3 px-4 border-2 border-line rounded-2xl mb-4 flex items-center">
            <button class="border-line border-2 rounded-2xl py-4 px-8 hover:bg-[#EFF0F7] transition duration-300 ease-out" @click="addLess()">
              <img src="/images/icons/minus.svg">
            </button>

            <input
              v-model="quatity"
              min="0"
              type="number"
              placeholder="Cantidad"
              class="bg-transparent border-0 focus:outline-none focus:shadow-none focus:ring-0 mx-auto block text-center text-lg font-semibold text-input-placeholder-color hide-numeric"
            >

            <button class="border-line border-2 rounded-2xl py-4 px-8 hover:bg-[#EFF0F7] transition duration-300 ease-out" @click="addMore()">
              <img src="/images/icons/plus-2.svg">
            </button>
          </div>

          <button class="cta text-white transition duration-300 ease-out bg-primary hover:bg-[#184158] p-4 font-semibold rounded-2xl w-full flex justify-center items-center leading-[34px]" @click="addToCart()">
            Agregar a la cotización actual
            <img src="/images/icons/plus.svg" class="ml-2">
          </button>
        </div>
      </div>
    </div>

    <hr class="border-2 border-line mb-4 md:hidden">

    <div class="mb-6">
      <h5 class="text-[#6E7191] text-[13px] md:text-base font-semibold mb-2">Descripción:</h5>
      <div class="md:text-lg">
        <p>
          {{ product.description }}
        </p>
      </div>
    </div>

    <div class="md:hidden fixed z-40 left-0 right-0 bottom-[80px] w-full">
      <div class="bg-white py-3 px-4 border-t-2 border-line flex items-center">
        <button class="border-line border-2 rounded-2xl py-4 px-8 hover:bg-[#EFF0F7] transition duration-300 ease-out" @click="addLess()">
          <img src="/images/icons/minus.svg">
        </button>

        <input
          v-model="quatity"
          min="0"
          type="number"
          placeholder="Cantidad"
          class="max-w-[120px] bg-transparent border-0 focus:outline-none focus:shadow-none focus:ring-0 mx-auto block text-center text-sm md:text-lg font-semibold text-input-placeholder-color hide-numeric"
        >

        <button class="border-line border-2 rounded-2xl py-4 px-8 hover:bg-[#EFF0F7] transition duration-300 ease-out" @click="addMore()">
          <img src="/images/icons/plus-2.svg">
        </button>
      </div>

      <button class="cta text-white transition duration-300 ease-out bg-primary hover:bg-[#184158] p-4 font-semibold w-full flex justify-center items-center text-sm leading-[34px]" @click="addToCart()">
        Agregar a la cotización actual
        <img src="/images/icons/plus.svg" class="ml-2">
      </button>
    </div>
  </section>
</template>

<script>
export default {
  layout: 'dashboard',
  asyncData ({ $axios, route }) {
    return $axios.get(`/products/${route.params.slug}`).then((res) => {
      return { product: res.data.data }
    }).catch((error) => {
      throw error
    })
  },
  data () {
    return {
      quatity: null,
    }
  },
  methods: {
    addToCart () {
      if (!this.quantity)
        this.addMore()

      this.$store.dispatch('cart/add', {
        product: this.$route.params.slug,
        quantity: this.quatity || 1,
      })
    },
    addMore () {
      this.quatity++
    },
    addLess () {
      if (this.quatity > 0)
        this.quatity--
    },
  },
}
</script>

<style scoped>
  .image {
    box-shadow: 4px 4px 24px rgba(0, 0, 0, 0.04)
  }
  .hide-numeric::-webkit-outer-spin-button, .hide-numeric::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }
  .hide-numeric[type=number] {
    -moz-appearance: textfield;
  }
  .cta:hover {
    box-shadow: 0px 32px 64px rgba(17, 17, 17, 0.08);
  }
</style>
