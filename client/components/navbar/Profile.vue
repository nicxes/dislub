<template>
  <div class="flex items-center">
    <div class="Profile relative mr-4">
      <transition name="fade">
        <div v-show="menu" class="absolute z-10 mb-1 bottom-[100%] left-0 bg-input-background border-2 border-line rounded-2xl p-[10px] w-[156px]">
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

      <div class="relative w-12 h-12 flex items-center justify-center bg-yellow-200 font-bold rounded-full cursor-pointer" @click="openMenu()">
        {{ initials }}
      </div>
    </div>

    <div v-if="$store.state.user.data.role === 'ADMIN'" class="bg-[#8BC7DA] bg-opacity-25 font-medium py-2 px-4 rounded-[40px] flex items-center">
      <img src="/images/icons/crown.svg" class="mr-2">
      Admin
    </div>
  </div>
</template>

<script>
export default {
  data () {
    return {
      menu: false,
    }
  },
  computed: {
    initials () {
      return this.$store.state.user.data.name.split(' ')[0].charAt(0).toUpperCase()
    },
  },
  methods: {
    openMenu () {
      this.menu = !this.menu
    },
    logout () {
      this.$cookies.remove('dislub-auth')
      this.$router.push('/')
    },
  },
}
</script>
