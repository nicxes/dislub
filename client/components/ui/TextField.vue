<template>
  <input
    :type="type"
    :placeholder="placeholder"
    class="
      bg-input-background rounded-2xl border-0 px-6 py-3 mb-6 focus:outline-none focus:shadow-none focus:ring-transparent
      text-input-text font-bold
      placeholder-text-input-text placeholder-font-bold placeholder-input-placeholder-color
    "
  >
</template>

<script>
export default {
  props: {
    type: {
      default: 'text',
      require: true,
      type: String,
    },
    placeholder: {
      default: '',
      require: false,
      type: String,
    },
  },
}
</script>
