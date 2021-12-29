<template>
  <div class="md:hidden mb-6">
    <nav class="bg-white border-b border-[#D9DBE9] px-4 py-3 flex items-center justify-between">
      <Logo />
      <div>
        <button class="border border-[#D9DBE9] rounded-lg p-2">
          <img src="/images/icons/menu.svg">
        </button>
      </div>
    </nav>

    <div v-if="showCart" class="bg-primary-yellow text-white px-2 py-1 flex flex-col items-center justify-between">
      <div class="flex items-center">
        <img src="/images/icons/cart.svg" class="mr-1">
        <span class="text-[13px] font-medium">Cotización acutal:</span>
      </div>
      <span class="text-sm font-semibold leading-[26px]">152 productos</span>
    </div>
  </div>
</template>

<script>
export default {
  data () {
    return {
      showCart: true,
    }
  },
}
</script>
