<template>
  <NuxtLink :to="to" class="flex justify-center items-center flex-col rounded-2xl py-1 text-[#A0A3BD] font-medium text-sm leading-[22px]">
    <img :src="icon">
    {{ text }}
  </NuxtLink>
</template>

<script>
export default {
  props: {
    text: {
      type: String,
      required: true,
    },
    to: {
      type: String,
      required: true,
    },
    icon: {
      type: String,
      required: true,
    },
  },
}
</script>

<style scoped>
  .nuxt-link-active {
    color: #3B89A1;
    background: #EFF0F6;
  }
</style>
