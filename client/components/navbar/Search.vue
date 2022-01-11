<template>
  <div class="flex items-center">
    <button
      v-if="$router.currentRoute.name === 'products-slug'"
      class="text-primary text-[14px] font-semibold leading-[24px] px-3 py-[14px] border-2 rounded-2xl hover:bg-[#EFF0F6] hover:border-[#EFF0F6] border-line transition duration-300 ease-out mr-4 flex items-center"
      @click="$router.go(-1)"
    >
      <img src="/images/icons/back.svg" class="mr-2">
      Volver
    </button>

    <div class="Search relative">
      <input
        v-model="search"
        type="search"
        placeholder="Buscá cualquier producto"
        class="py-3 pl-16 pr-6 border-2 bg-[#FCFCFC] border-line rounded-2xl w-96 focus:shadow-none focus:outline-none focus:ring-0 focus:border-line transition duration-300 ease-out"
        @keyup.enter="searchProduct"
      >
    </div>
  </div>
</template>

<script>
export default {
  data () {
    return {
      search: '',
    }
  },
  methods: {
    searchProduct () {
      this.$router.push({
        name: 'products',
        params: {
          search: this.search,
        },
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
