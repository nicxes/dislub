<template>
  <li>
    <NuxtLink :to="to" class="flex items-center text-input-placeholder-color py-3 px-4 rounded-2xl mb-3 hover:text-primary transition duration-300 ease-in-out">
      <div>
        <img :src="icon">
      </div>

      <span class="ml-2">
        {{ text }}
      </span>
    </NuxtLink>
  </li>
</template>

<script>
export default {
  props: {
    icon: {
      type: String,
      required: true,
    },
    text: {
      type: String,
      required: true,
    },
    to: {
      type: String,
      required: true,
    },
  },
}
</script>

<style scoped>
  .Navigation .nuxt-link-active {
    @apply text-primary;
    background: rgba(217, 219, 233, 0.6);
  }
</style>
