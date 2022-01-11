<template>
  <section class="px-4 md:px-6 pb-20">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-y-4 items-center border-2 border-line bg-[#FCFCFC] rounded-2xl p-4">
      <div>
        <div class="grid grid-cols-2 divide-x-2">
          <div v-if="$store.getters['cart/quantity'] > 0" class="pr-8">
            <h5 class="text-lg mb-4">Productos</h5>

            <ul class="grid grid-cols-1 gap-4 pb-6 mb-6 border-b-2 border-line">
              123
            </ul>
          </div>

          <div class="pl-8">
            <h3 class="text-2xl font-bold mb-2">Confirme su dirección de correo electrónico</h3>
            <p class="mb-2">Esta es la dirección a donde nuestro equipo enviará la cotización una vez lista:</p>

            <div>
            </div>
          </div>
        </div>
      </div>

      <div>
        2
      </div>
    </div>
  </section>
</template>

<script>
export default {
  layout: 'dashboard',
}
</script>
