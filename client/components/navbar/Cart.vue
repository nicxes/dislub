<template>
  <NuxtLink to="/cart">
    <div class="flex items-center bg-primary-yellow border-2 border-[#C69219] text-white rounded-xl px-3 py-2">
      <img src="/images/icons/cart.svg" class="h-[36px] w-[36px] mr-4">

      <div>
        <h4 class="font-medium text-xs leading-[14px] mb-1 flex items-center">Cotización actual:</h4>
        <h5 class="font-semibold text-base leading-4 tracking-[0.75px]">{{ $store.getters['cart/quantity'] }} productos</h5>
      </div>
    </div>
  </NuxtLink>
</template>
