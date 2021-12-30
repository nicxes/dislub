<template>
  <section class="px-6 pb-20">
    <div class="grid grid-cols-12 mb-6">
      <div class="col-span-5">
        <input type="search" class="bg-white border-2 border-line rounded-2xl py-3 px-6 w-full block ga" placeholder="Buscá por nombre o e-mail ">
      </div>

      <div class="col-start-11 col-span-2 flex justify-end">
        <button class="bg-primary text-white rounded-2xl flex items-center p-4">
          Crear un nuevo usuario
          <img src="/images/icons/user-white.svg" class="ml-2">
        </button>
      </div>
    </div>

    <ul class="grid grid-cols-1 gap-4">
      <CardUser />
      <CardUser />
      <CardUser />
      <CardUser />
      <CardUser />
      <CardUser />
    </ul>
  </section>
</template>

<script>
export default {
  layout: 'dashboard',
}
</script>
