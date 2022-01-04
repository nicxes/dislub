<template>
  <section class="px-4 md:px-6 pb-20">
    <h1 class="md:hidden text-2xl font-bold text-black mb-4">
      Usuarios de la plataforma
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-12 mb-6 gap-y-6">
      <div class="Search relative md:col-span-5 order-2 md:order-1">
        <input
          v-model="search"
          type="search"
          class="bg-white border-2 border-line focus:border-line focus:shadow-none focus:ring-0 rounded-2xl py-3 px-6 pl-16 w-full block ga"
          placeholder="Buscá por nombre"
          @input="searchByName($event.target.value)"
        >
      </div>

      <div class="md:col-start-11 md:col-span-2 md:flex md:justify-end order-1 md:order-2">
        <button class="bg-primary text-white text-[13px] md:text-base font-semibold rounded-2xl flex items-center justify-center p-4 w-full md:w-auto">
          Crear un nuevo usuario
          <img src="/images/icons/user-white.svg" class="ml-2 h-3 w-3 md:w-auto md:h-auto">
        </button>
      </div>
    </div>

    <ul class="grid grid-cols-1 gap-4">
      <CardUser
        v-for="(user) in users"
        :key="user.id"
        :user="user"
      />
    </ul>
  </section>
</template>

<script>
export default {
  layout: 'dashboard',
  data () {
    return {
      users: [],
      search: '',
    }
  },
  mounted () {
    this.getUsers()
  },
  methods: {
    getUsers () {
      this.$axios.$get('organizations').then((res) => {
        this.users = res.data
      }).catch((err) => {
        console.log(err)
      })
    },
    searchByName (value) {
      console.log(value)
    },
  },
}
</script>

<style scoped>
  .Search::before {
    content: '';
    position: absolute;
    left: 24px;
    top: 15px;
    z-index: 10;

    height: 24px;
    width: 24px;

    background: url('/images/icons/search.svg') no-repeat center center;
  }
</style>
