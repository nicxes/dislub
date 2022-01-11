<template>
  <section class="px-4 md:px-6 pb-20">
    <transition name="fade">
      <div v-if="status">
        <div class="grid grid-cols-2 divide-x-2">
          <div v-if="$store.getters['cart/quantity'] > 0" class="pr-8">
            <h5 class="text-lg mb-4">Productos</h5>

            <ul class="grid grid-cols-1 gap-4 pb-6 mb-6 border-b-2 border-line">
              <Order
                v-for="(product, index) in $store.state.cart.products"
                :key="product.id"
                :product="product"
                @update="toggleModal('edit', { index, product })"
                @delete="remove(index)"
              />
            </ul>
          </div>

          <div v-else class="text-center">
            <img src="/images/cart.png" class="mx-auto">
            <h4 class="text-[#4E4B66] font-bold leading-[28px]">¡El carrito está vacío!</h4>
            <p class="text-[#4E4B66] font-medium leading-[28px]">Agregue productos para poder enviar su cotización.</p>
          </div>

          <div class="pl-8">
            <h3 class="text-2xl font-bold mb-2">Confirme su dirección de correo electrónico</h3>
            <p class="mb-2">Esta es la dirección a donde nuestro equipo enviará la cotización una vez lista:</p>

            <div>
              <div class="relative Email mb-8">
                <input v-model="form.email" type="email" placeholder="Indique su e-mail" class="placeholder-input-placeholder-color bg-transparent placeholder:font-semibold py-4 px-12 border-2 border-line block w-full rounded-2xl focus:ring-0 focus:outline-none focus:border-line hover:bg-[#EFF0F6] focus:bg-[#FCFCFC] transition duration-300 ease-in-out">
              </div>

              <div class="mb-8">
                <p class="text-[#14142B] font-medium mb-1">Comentarios (Opcional)</p>
                <textarea v-model="form.comments" class="placeholder:font-medium placeholder-input-placeholder-color bg-transparent border-2 border-line rounded-2xl px-4 py-3 w-full focus:ring-0 focus:outline-none focus:shadow-none focus:border-line focus:bg-white transition duration-300 ease-in-out" rows="8" placeholder="Si tiene comentarios adicionales, déjelos aquí" />
              </div>

              <div>
                <button
                  class="bg-primary text-white font-semibold text-lg leading-[34px] w-full py-4 rounded-2xl flex items-center justify-center"
                  :class="{ '!bg-line text-input-placeholder-color cursor-not-allowed' : !form.email || form.products.length === 0 }"
                  :disabled="!form.email || form.products.length === 0"
                  @click="send()"
                >
                  Enviar cotización
                  <img v-if="!form.email || form.products.length === 0" src="/images/icons/send-disabled.svg" class="ml-2">
                  <img v-else src="/images/icons/send.svg" class="ml-2">
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </transition>

    <transition name="fade">
      <div v-if="success" class="flex items-center justify-center">
        <div class="text-center max-w-lg">
          <div class="flex justify-center">
            <img src="/images/success.png" class="h-96">
          </div>

          <h1 class="text-4xl font-bold mb-2">¡Cotización enviada exitosamente!</h1>
          <p class="text-lg mb-6">Nuestro equipo revisará tu solicitud y te contactará lo antes posible.</p>
          <NuxtLink to="/dashboard">
            <a class="bg-primary text-white font-semibold text-lg leading-[34px] w-full py-4 rounded-2xl flex items-center justify-center">
              Volver al inicio
              <img src="/images/icons/home-white.svg" class="ml-2">
            </a>
          </NuxtLink>
        </div>
      </div>
    </transition>

    <transition name="fade">
      <div v-if="modal.edit" class="fixed z-50 left-0 right-0 top-0 bottom-0 bg-black bg-opacity-30 flex items-end md:items-center justify-center" @click="toggleModal('edit')">
        <div class="bg-white rounded-t-3xl md:rounded-3xl p-6 max-w-[604px] w-full" @click.stop>
          <div class="text-center mb-6">
            <h3 class="text-[#14142B] text-2xl font-bold">Editar cantidad:</h3>
          </div>

          <div class="mb-4">
            <div class="bg-white p-1 border-2 border-line rounded-2xl flex items-center max-w-[303px] mx-auto">
              <button class="border-line border-2 rounded-[8px] p-1 hover:bg-[#EFF0F7] transition duration-300 ease-out" @click="addLess()">
                <img src="/images/icons/minus.svg">
              </button>

              <input
                v-model="modal.data.quantity"
                min="0"
                type="number"
                placeholder="Cantidad"
                class="max-w-[140px] bg-transparent border-0 focus:outline-none focus:shadow-none focus:ring-0 mx-auto block text-center text-sm md:text-lg font-semibold placeholder-[#A0A3BD] text-[#4E4B66] hide-numeric"
              >

              <button class="border-line border-2 rounded-[8px] p-1 hover:bg-[#EFF0F7] transition duration-300 ease-out" @click="addMore()">
                <img src="/images/icons/plus-2.svg">
              </button>
            </div>
          </div>

          <div class="flex items-center justify-center">
            <button class="bg-primary hover:bg-[#184158] border-2 border-primary text-white rounded-2xl py-[14px] px-[22px] font-semibold text-sm md:text-lg flex items-center justify-center transition duration-300 ease-out mr-4" @click="setQuantity()">
              Confirmar
            </button>

            <button class="bg-transparent hover:border-[#184158] hover:text-[#184158] border-2 border-primary text-primary rounded-2xl py-[14px] px-[22px] font-semibold text-sm md:text-lg leading-[18px] flex items-center justify-center transition duration-300 ease-out" @click="toggleModal('edit')">
              Cancelar
            </button>
          </div>
        </div>
      </div>
    </transition>
  </section>
</template>

<script>
export default {
  layout: 'dashboard',

  data () {
    return {
      status: true,
      success: false,
      modal: {
        edit: false,
        delete: false,
        index: null,
        data: null,
      },
      form: {
        organization_id: this.$store.state.user.data.id,
        email: this.$store.state.user.data.email,
        comments: '',
        products: this.$store.state.cart.products,
        total_products: this.$store.getters['cart/quantity'],
      },
    }
  },

  methods: {
    send () {
      this.$axios.$post('/orders', this.form).then(() => {
        this.status = false

        setTimeout(() => {
          this.success = true
        }, 800)
      }).catch((err) => {
        console.log(err)
      })
    },
    remove (index) {
      this.$store.dispatch('cart/remove', index)
    },
    addMore () {
      this.modal.data.quantity++
    },
    addLess () {
      if (this.modal.data.quantity > 1)
        this.modal.data.quantity--
    },
    setQuantity () {
      this.$store.dispatch('cart/setQuantity', {
        index: this.modal.index,
        quantity: parseInt(this.modal.data.quantity),
      })
      this.toggleModal('edit')
    },
    toggleModal (modal, data) {
      this.modal[modal] = !this.modal[modal]

      if (data) {
        this.modal.index = data.index
        this.modal.data = Object.assign({}, data.product)
      } else {
        this.modal.index = null
        this.modal.data = null
      }
    },
  },
}
</script>

<style scoped>
  .Email:before {
    content: '';
    background: url('/images/icons/email.svg') no-repeat center;
    position: absolute;
    left: 10px;
    top: 9px;
    z-index: 10;
    width: 40px;
    height: 40px;
  }
  .Email input {
    filter: drop-shadow(4px 4px 24px rgba(0, 0, 0, 0.04));
  }
  .Email input:hover {
    filter: none;
  }
  .hide-numeric::-webkit-outer-spin-button, .hide-numeric::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }
  .hide-numeric[type=number] {
    -moz-appearance: textfield;
  }
</style>
