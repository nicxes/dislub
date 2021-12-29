<template>
  <h1 class="text-black text-[32px] font-bold tracking-[1px]">
    {{ title }}
  </h1>
</template>

<script>
export default {
  props: {
    title: {
      type: String,
      required: true,
    },
  },
}
</script>
