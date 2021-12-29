<template>
  <section class="px-6 pb-20">
    <div class="grid grid-cols-2 gap-6">
      <div>
        <h5 class="text-lg mb-4">Lubricante semisintético</h5>
      </div>

      <div>
        <h3 class="text-2xl font-bold mb-2">Confirme su dirección de correo electrónico</h3>
        <p class="mb-2">Esta es la dirección a donde nuestro equipo enviará la cotización una vez lista:</p>

        <form>
          <div class="mb-8">
            <input type="email" placeholder="Indique su e-mail" class="placeholder-input-placeholder-color bg-transparent font-semibold py-4 px-12 border-2 border-line block w-full rounded-2xl focus:ring-0 focus:outline-none focus:border-line">
          </div>

          <div>
            <button type="submit" class="bg-primary text-white font-semibold text-lg leading-[34px] w-full py-4 rounded-2xl flex items-center justify-center">
              Enviar cotización
              <img src="/images/icons/send.svg" class="ml-2">
            </button>
          </div>
        </form>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  layout: 'dashboard',
}
</script>
