<template>
  <section class="px-6">
    <div class="container mx-auto">
      <Carousel />
      <LastedProducts />
      <LastedOrders />
    </div>
  </section>
</template>

<script>
export default {
  layout: 'dashboard',
  middleware: ['pin'],
}
</script>
