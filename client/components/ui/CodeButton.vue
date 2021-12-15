<template>
  <button class="h-20 w-20 flex items-center justify-center border-2 border-primary rounded-full text-primary text-2xl font-bold">
    <span>{{ label }}</span>
  </button>
</template>

<script>
export default {
  props: {
    label: {
      type: Number,
      required: true,
    },
  },
}
</script>
