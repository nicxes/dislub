<template>
  <section class="px-4 pb-28 md:pb-4 md:px-6">
    <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-6 mb-9">
      <div class="Search relative">
        <input
          type="search"
          placeholder="Buscá por nombre"
          class="w-full md:w-96 py-3 pl-16 pr-6 text-input-placeholder-color border-2 bg-[#FCFCFC] border-line rounded-2xl focus:shadow-none focus:outline-none focus:ring-0 focus:border-line transition duration-300 ease-out"
        >
      </div>

      <div class="flex justify-end">
        <button class="text-white font-medium bg-primary rounded-2xl w-full max-w-sm py-3 flex justify-center items-center">
          Crear nueva categoría
          <img src="/images/icons/plus.svg" class="ml-2">
        </button>
      </div>
    </div>

    <ul class="grid gap-y-4">
      <li v-for="category in categories" :key="category.id">
        <CardCategory :category="category" @refresh-categories="getCategories" />
      </li>
    </ul>
  </section>
</template>

<script>
export default {
  layout: 'dashboard',
  data () {
    return {
      categories: [],
    }
  },
  mounted () {
    this.getCategories()
  },
  methods: {
    getCategories () {
      this.$axios.$get('/categories').then((res) => {
        this.categories = res.data
      }).catch((err) => {
        console.log(err)
      })
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
