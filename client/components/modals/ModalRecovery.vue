<template>
  <transition name="fade" mode="in-out">
    <div v-if="$store.state.recovery.open" class="fixed top-0 right-0 bottom-0 left-0 bg-black bg-opacity-40 transition duration-300 ease-in-out">
      <div class="animated absolute bottom-0 left-0 right-0 mx-auto max-w-lg bg-white rounded-t-3xl px-4 pt-4 pb-10 text-center">
        <div class="flex justify-end mb-5">
          <div @click="$store.commit('recovery/toggle')">
            <img src="/images/icons/close.svg" class="cursor-pointer">
          </div>
        </div>

        <h2 class="text-black text-4xl font-bold mb-6">¿Problemas para ingresar?</h2>
        <p class="mb-12">Contactate con nuestro equipo para resolverlo lo antes posible.</p>

        <ul>
          <li class="mb-2">
            <a href="tel:0800-5999-654" class="text-primary font-semibold">
              Teléfono: 0800-5999-654
            </a>
          </li>

          <li>
            <a href="mailto:dislub@dislub.com" class="text-primary font-semibold">
              Email: dislub@dislub.com
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
