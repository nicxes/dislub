<template>
  <section class="px-6 pb-20">
    <div class="grid grid-cols-2 gap-6 mb-10">
      <div class="image bg-[#FCFCFC] rounded-[36px] p-14">
        <img src="/images/products/5-full.png" alt="" class="mx-auto">
      </div>

      <div class="flex flex-col justify-between">
        <div>
          <h1 class="text-[32px] font-bold uppercase tracking-[1px] mb-6">MOBIL DELVAC 1 5W-40</h1>

          <ul>
            <li class="mb-2">
              <h5 class="text-[#6E7191] font-semibold">Categoría:</h5>
              <h6 class="text-lg">Lubricante semisintético</h6>
            </li>

            <li class="mb-2">
              <h5 class="text-[#6E7191] font-semibold">Viscocidad:</h5>
              <h6 class="text-lg">XXXX</h6>
            </li>

            <li class="mb-2">
              <h5 class="text-[#6E7191] font-semibold">Volumen (Lts.)</h5>
              <h6 class="text-lg">XXXX</h6>
            </li>
          </ul>
        </div>

        <div>
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

          <button class="cta text-white transition duration-300 ease-out bg-primary hover:bg-[#184158] p-4 font-semibold rounded-2xl w-full flex justify-center items-center leading-[34px]">
            Agregar a la cotización actual
            <img src="/images/icons/plus.svg" class="ml-2">
          </button>
        </div>
      </div>
    </div>

    <div class="mb-6">
      <h5 class="text-[#6E7191] font-semibold">Descripción:</h5>
      <div class="text-lg">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus iusto voluptate delectus! Officiis nostrum aliquam veritatis nam, voluptas quaerat explicabo illo pariatur? Sit soluta architecto ex nostrum. Non, quia repellat.</p>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  layout: 'dashboard',
  data () {
    return {
      quatity: null,
    }
  },
  methods: {
    addToCart () {
      this.$store.dispatch('cart/add', {
        product: this.$route.params.slug,
        quantity: this.quatity,
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
