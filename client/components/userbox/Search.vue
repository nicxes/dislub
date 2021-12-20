<template>
  <div>
    <input v-model="search" type="search" placeholder="Buscá cualquier producto" class="Search py-3 px-6 border-2 border-input-background rounded-2xl w-96">
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
  .Search {
    background: #EFF0F6;
  }
</style>
