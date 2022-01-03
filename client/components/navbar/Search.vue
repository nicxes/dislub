<template>
  <div class="Search relative">
    <input
      v-model="search"
      type="search"
      placeholder="Buscá cualquier producto"
      class="py-3 pl-16 pr-6 border-2 bg-[#FCFCFC] border-line rounded-2xl w-96 focus:shadow-none focus:outline-none focus:ring-0 focus:border-line transition duration-300 ease-out"
    >
  </div>
</template>

<script>
export default {
  data () {
    return {
      search: '',
    }
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
