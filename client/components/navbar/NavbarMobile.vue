<template>
  <div class="md:hidden mb-6">
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
                @click="help()"
              >
                Ayuda
              </li>
            </ul>
          </div>
        </transition>
      </div>
    </nav>

    <div v-if="showCart" class="bg-primary-yellow text-white px-2 py-1 flex flex-col items-center justify-between">
      <div class="flex items-center">
        <img src="/images/icons/cart.svg" class="mr-1">
        <span class="text-[13px] font-medium">Cotización acutal:</span>
      </div>
      <span class="text-sm font-semibold leading-[26px]">152 productos</span>
    </div>
  </div>
</template>

<script>
export default {
  data () {
    return {
      showMenu: false,
      showCart: true,
    }
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
