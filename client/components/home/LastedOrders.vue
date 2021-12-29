<template>
  <section class="pb-32 md:pb-20">
    <h3 class="text-darked text-2xl md:text-3xl font-bold md:text-center mb-3 md:mb-4 tracking-[1px]">Últimas cotizaciones</h3>

    <ul class="mb-6">
      <CardOrder />
      <CardOrder />
      <CardOrder />
    </ul>

    <div class="flex justify-center">
      <NuxtLink to="/my-orders" class="text-primary font-semibold border-primary border-2 rounded-[40px] hover:bg-primary hover:text-white px-4 py-4 w-96 block text-center transition duration-300">
        Ver historial completo
      </NuxtLink>
    </div>
  </section>
</template>
