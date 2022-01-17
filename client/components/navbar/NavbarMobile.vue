<template>
  <div class="md:hidden sticky top-0 left-0 right-0 z-40 mb-4">
    <nav class="bg-white border-b border-[#D9DBE9] px-4 py-3 flex items-center justify-between">
      <div>
        <NuxtLink to="/">
          <Logo />
        </NuxtLink>
      </div>

      <div class="relative">
        <button class="border border-[#D9DBE9] rounded-lg p-2" @click="openMenu()">
          <img src="/images/icons/menu.svg">
        </button>

        <transition name="fade">
          <div v-show="showMenu" class="absolute z-10 mt-1 right-0 bg-input-background border-2 border-line rounded-2xl p-[10px] w-[156px]">
            <ul class="grid grid-cols-1 gap-y-1">
              <li
                class="text-[#6E7191] hover:text-darked hover:bg-line rounded-lg px-2 py-1 transition duration-300 ease-out cursor-pointer"
                @click="logout()"
              >
                Cerrar sesión
              </li>
              <li
                class="text-[#6E7191] hover:text-darked hover:bg-line rounded-lg px-2 py-1 transition duration-300 ease-out cursor-pointer"
                @click="$store.commit('recovery/toggle')"
              >
                Ayuda
              </li>
            </ul>
          </div>
        </transition>
      </div>
    </nav>

    <div v-if="showCart" class="bg-primary-yellow text-white px-2 py-1 flex flex-col items-center justify-between mb-6">
      <div class="flex items-center">
        <img src="/images/icons/cart.svg" class="mr-1">
        <span class="text-[13px] font-medium">Cotización actual:</span>
      </div>
      <span class="text-sm font-semibold leading-[26px]">{{ $store.getters['cart/quantity'] }} productos</span>
    </div>
  </div>
</template>

<script>
export default {
  data () {
    return {
      showMenu: false,
    }
  },
  computed: {
    showCart () {
      return this.$store.getters['cart/quantity'] > 0
    },
  },
  methods: {
    openMenu () {
      this.showMenu = !this.showMenu
    },
    logout () {
      this.$cookies.remove('dislub-auth')
      this.$router.push('/')
    },
  },
}
</script>
