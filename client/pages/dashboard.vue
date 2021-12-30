<template>
  <div class="px-6">
    <Carousel />
    <LastedProducts />
    <LastedOrders />
  </div>
</template>

<script>
export default {
  layout: 'dashboard',
  middleware: ['pin'],
}
</script>
