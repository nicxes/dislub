<template>
  <section class="px-4 md:px-6 pb-64 md:pb-0">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-2 md:gap-6 mb-4 md:mb-10">
      <div class="flex mb-2 md:hidden">
        <button
          class="text-primary text-[14px] font-semibold leading-[24px] p-2 border-2 rounded-2xl hover:bg-[#EFF0F6] hover:border-[#EFF0F6] border-line transition duration-300 ease-out mr-4 flex items-center"
          @click="$router.go(-1)"
        >
          <img src="/images/icons/back.svg" class="mr-2">
          Volver
        </button>
      </div>

      <h1 class="md:hidden text-2xl font-bold uppercase tracking-[1px]">
        {{ product.name }}
      </h1>

      <div class="image bg-[#FCFCFC] rounded-[36px] p-14 mb-3 md:mb-0 flex items-center justify-center">
        <img src="/images/products/placeholder.svg" alt="" class="mx-auto">
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
              <h6 class="md:text-lg">{{ product.viscocidad || '-' }}</h6>
            </li>

            <li class="md:mb-2">
              <h5 class="text-[#6E7191] text-[13px] md:text-base font-semibold">Volumen (Lts.)</h5>
              <h6 class="md:text-lg">{{ product.volume || '-' }}</h6>
            </li>
          </ul>
        </div>

        <div class="hidden md:block">
          <div class="bg-white py-3 px-4 border-2 border-line rounded-2xl mb-4 flex items-center">
            <button class="border-line border-2 rounded-2xl py-4 px-8 hover:bg-[#EFF0F7] transition duration-300 ease-out" @click="addLess()">
              <img src="/images/icons/minus.svg">
            </button>

            <input
              v-model="quantity"
              min="0"
              type="number"
              placeholder="Cantidad"
              class="bg-transparent border-0 focus:outline-none focus:shadow-none focus:ring-0 mx-auto block text-center text-lg font-semibold placeholder-[#A0A3BD] text-[#4E4B66] hide-numeric"
            >

            <button class="border-line border-2 rounded-2xl py-4 px-8 hover:bg-[#EFF0F7] transition duration-300 ease-out" @click="addMore()">
              <img src="/images/icons/plus-2.svg">
            </button>
          </div>

          <button
            class="cta text-white transition duration-300 ease-out bg-primary hover:bg-[#184158] px-4 py-[19px] text-lg leading-[18px] font-semibold rounded-2xl w-full flex justify-center items-center"
            :class="{ '!bg-input-placeholder-color text-[#FCFCFC] cursor-not-allowed' : loading }"
            :disabled="loading"
            @click="addToCart()"
          >
            <span v-if="!loading">
              Agregar a la cotización actual
            </span>

            <span v-else>
              Cargando
            </span>

            <img v-if="!loading" src="/images/icons/plus.svg" class="ml-2">
            <img v-else src="/images/icons/loading.svg" class="ml-2 animate-spin">
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

    <div class="hidden md:block border-t-2 border-line mt-12">
      <LastedProducts :w="width" :title="false" :button="false" />
    </div>

    <div class="md:hidden fixed z-40 left-0 right-0 bottom-[80px] w-full">
      <div class="bg-white py-3 px-4 border-t-2 border-line flex items-center">
        <button class="border-line border-2 rounded-2xl py-4 px-8 hover:bg-[#EFF0F7] transition duration-300 ease-out" @click="addLess()">
          <img src="/images/icons/minus.svg">
        </button>

        <input
          v-model="quantity"
          min="0"
          type="number"
          placeholder="Cantidad"
          class="max-w-[120px] bg-transparent border-0 focus:outline-none focus:shadow-none focus:ring-0 mx-auto block text-center text-sm md:text-lg font-semibold placeholder-[#A0A3BD] text-[#4E4B66] hide-numeric"
        >

        <button class="border-line border-2 rounded-2xl py-4 px-8 hover:bg-[#EFF0F7] transition duration-300 ease-out" @click="addMore()">
          <img src="/images/icons/plus-2.svg">
        </button>
      </div>

      <button
        class="cta text-white transition duration-300 ease-out bg-primary hover:bg-[#184158] p-4 font-semibold w-full flex justify-center items-center text-sm leading-[34px]"
        :class="{ '!bg-input-placeholder-color text-[#FCFCFC] cursor-not-allowed' : loading }"
        :disabled="loading"
        @click="addToCart()"
      >
        <span v-if="!loading">
          Agregar a la cotización actual
        </span>

        <span v-else>
          Cargando
        </span>

        <img v-if="!loading" src="/images/icons/plus.svg" class="ml-2">
        <img v-else src="/images/icons/loading.svg" class="ml-2 animate-spin">
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
      loading: false,
      quantity: null,
      width: null,
    }
  },
  mounted () {
    this.setWidth()
    window.addEventListener('resize', (e) => {
      this.setWidth()
    })
  },
  methods: {
    setWidth () {
      if (window.innerWidth > 426) {
        this.width = window.innerWidth - 270.859
        this.width = this.width - 40
      }
    },
    addToCart () {
      if (!this.quantity || this.quantity < 1)
        this.addMore()

      this.loading = true

      setTimeout(() => {
        const audio = new Audio('/sounds/pop.mp3')
        audio.play()
      }, 250)

      setTimeout(() => {
        this.$store.dispatch('cart/add', {
          ...this.product,
          product_id: this.product.id,
          quantity: this.quantity || 1,
        })

        this.loading = false
      }, 750)
    },
    addMore () {
      this.quantity++
    },
    addLess () {
      if (this.quantity > 0)
        this.quantity--
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
