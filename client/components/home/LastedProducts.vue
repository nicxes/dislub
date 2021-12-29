<template>
  <section class="py-12">
    <h3 class="text-darked text-2xl md:text-3xl font-bold md:text-center mb-4 tracking-[1px]">Productos</h3>

    <ul class="hidden md:grid grid-cols-7 gap-6 mb-6">
      <CardProduct name="FORMULA 5W-30" image="/images/products/1.png" />
      <CardProduct name="MOBIL DELVAC 1 5W-40" image="/images/products/2.png" />
      <CardProduct name="MOBIL SUPER 1000 X3 15W-40" image="/images/products/3.png" />
      <CardProduct name="MOBIL 1 FS X2 5W-50" image="/images/products/4.png" />
      <CardProduct name="MOBIL DELVAC 1 5W-40" image="/images/products/5.png" />
      <CardProduct name="FORMULA 5W-30" image="/images/products/1.png" />
      <CardProduct name="MOBIL 1 FS X2 5W-50" image="/images/products/2.png" />
    </ul>

    <div class="flex justify-center">
      <NuxtLink to="/products" class="text-background font-semibold bg-primary rounded-[40px] px-4 py-4 w-96 block text-center">
        Ver todos los productos
      </NuxtLink>
    </div>
  </section>
</template>
