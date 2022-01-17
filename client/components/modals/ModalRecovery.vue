<template>
  <transition name="fade" mode="in-out">
    <div v-if="$store.state.recovery.open" class="fixed top-0 right-0 bottom-0 left-0 z-50 bg-black bg-opacity-40 transition duration-300 ease-in-out" @click="$store.commit('recovery/toggle')">
      <div class="animated absolute bottom-0 left-0 right-0 mx-auto max-w-lg bg-white rounded-t-3xl px-4 pt-4 pb-10 text-center" @click.stop>
        <div class="flex justify-end mb-5">
          <div @click="$store.commit('recovery/toggle')">
            <img src="/images/icons/close.svg" class="cursor-pointer">
          </div>
        </div>

        <h2 class="text-black text-2xl md:text-4xl font-bold mb-4 mb-6">¿Necesitas ayuda?</h2>
        <p class="mb-12">Contactate con nuestro equipo para resolverlo lo antes posible.</p>

        <ul>
          <li class="mb-2">
            <a href="https://wa.me/5491125235378" target="_blank" class="text-primary font-semibold">
              Whatsapp: 11 2523 5378
            </a>
          </li>

          <li class="mb-2">
            <a href="tel:4822-9195" class="text-primary font-semibold">
              Teléfono: 4822-9195
            </a>
          </li>

          <li>
            <a href="mailto:ventas@dislub.com.ar" class="text-primary font-semibold">
              Email: ventas@dislub.com.ar
            </a>
          </li>
        </ul>
      </div>
    </div>
  </transition>
</template>

<style scoped>
  @keyframes animation {
    0% {transform: translateY(100%)}
    100% {transform: translateY(0%)}
  }
  .animated {
    animation: animation 300ms linear 1;
  }
</style>
