<template>
  <div class="flex items-center justify-center">
    <div class="text-center max-w-lg">
      <div class="flex justify-center">
        <img src="/images/success.png" class="h-96">
      </div>

      <h1 class="text-4xl font-bold mb-2">¡Cotización enviada exitosamente!</h1>
      <p class="text-lg mb-6">Nuestro equipo revisará tu solicitud y te contactará lo antes posible.</p>
      <NuxtLink to="/dashboard">
        <a class="bg-primary text-white font-semibold text-lg leading-[34px] w-full py-4 rounded-2xl flex items-center justify-center">
          Volver al inicio
          <img src="/images/icons/home-white.svg" class="ml-2">
        </a>
      </NuxtLink>
    </div>
  </div>
</template>

<script>
export default {
  layout: 'dashboard',
}
</script>
