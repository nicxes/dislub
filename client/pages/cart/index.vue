<template>
  <section class="px-6 pb-20">
    <transition name="fade">
      <div v-if="status">
        <div class="grid grid-cols-2 divide-x-2">
          <div v-if="$store.getters['cart/quantity'] > 0" class="pr-8">
            <h5 class="text-lg mb-4">Productos</h5>

            <ul class="grid grid-cols-1 gap-4 pb-6 mb-6 border-b-2 border-line">
              <Order v-for="(product, index) in $store.state.cart.products" :key="product.id" :product="product" @delete="remove(index)" />
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
                <button class="bg-primary text-white font-semibold text-lg leading-[34px] w-full py-4 rounded-2xl flex items-center justify-center" @click="send()">
                  Enviar cotización
                  <img src="/images/icons/send.svg" class="ml-2">
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
  </section>
</template>

<script>
export default {
  layout: 'dashboard',

  data () {
    return {
      status: true,
      success: false,
      form: {
        organization_id: this.$store.state.user.data.id,
        email: this.$store.state.user.data.email,
        comments: '',
        products: this.$store.state.cart.products,
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
</style>
