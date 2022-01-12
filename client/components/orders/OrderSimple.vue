<template>
  <li class="card relative grid grid-cols-8 md:grid-cols-6 gap-3 bg-[#FCFCFC] border-2 border-background rounded-2xl p-4 items-baseline">
    <div class="col-span-2 md:col-auto">
      <img src="/images/products/1.png" :alt="product.product.name" class="border-2 border-line rounded-2xl p-4">
    </div>

    <div class="col-span-4 md:col-span-4">
      <h5 class="text-darked font-semibold mb-1 uppercase">{{ product.product.name }}</h5>
      <h6 class="text-[#6E7191] text-sm">2 Litros, 40W</h6>
    </div>

    <div class="col-span-2 md:col-auto text-center flex flex-col">
      <h5 class="text-[#6E7191] text-sm font-medium mb-1">Cantidad:</h5>
      <span class="text-primary text-lg font-semibold bg-[#EFF0F6] rounded-2xl px-5 md:px-6 py-[10px] md:py-4 flex items-center justify-center">
        {{ product.quantity }}
      </span>
    </div>
  </li>
</template>

<script>
export default {
  props: {
    product: {
      type: Object,
      required: true,
    },
  },
  mounted () {
    console.log(this.product)
  },
}
</script>

<style scoped>
  .card {
    box-shadow: 4px 4px 24px rgba(0, 0, 0, 0.04);
  }
</style>
