<template>
  <NuxtLink :to="`/products/${product.id}`">
    <article class="Card bg-[#FCFCFC] rounded-2xl border-2 border-input-background hover:border-[#D9DBE9] h-full p-3 md:p-4 cursor-pointer transition duration-300">
      <div class="border-primary-yellow border-b-2 pb-4">
        <img :src="image" :alt="product.name" class="mx-auto">
      </div>

      <div class="mt-4">
        <h5 class="text-[#6E7191] font-semibold uppercase">
          {{ product.name }}
        </h5>
      </div>
    </article>
  </NuxtLink>
</template>

<script>
export default {
  props: {
    product: {
      type: Object,
      required: true,
    },
    image: {
      type: String,
      required: true,
    },
  },
}
</script>

<style scoped>
  .Card {
    box-shadow: 4px 4px 24px rgba(0, 0, 0, 0.04);
  }
  .Card:hover {
    box-shadow: 6px 12px 24px rgba(17, 17, 17, 0.06);
  }
</style>
