<template>
  <section class="px-6 pb-20">
    <ul class="grid grid-cols-2 md:grid-cols-7 gap-y-4 gap-x-5 md:gap-6">
      <CardProduct v-for="(product, i) in 30" :key="i" name="FORMULA 5W-30" image="images/products/1.png" />
    </ul>
  </section>
</template>

<script>
export default {
  layout: 'dashboard',
}
</script>
