<template>
  <button class="text-[#A0A3BD] font-medium text-sm leading-[24px] bg-transparent rounded-2xl py-2 px-4 flex items-center transition duration-300 ease-out" @click="clearCart()">
    <img src="/images/icons/trash-disabled.svg" class="mr-2">
    Vaciar carrito
  </button>
</template>

<script>
export default {
  methods: {
    clearCart () {
      this.$store.dispatch('cart/clean')
    },
  },
}
</script>
