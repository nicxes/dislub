<template>
  <div class="relative min-h-screen flex">
    <Navigation />
    <div class="w-full">
      <Userbox />
      <Nuxt />
    </div>
  </div>
</template>

<style>
  html, body {
    @apply bg-gray-100 text-gray-600
  }
  .container {
    max-width: 1240px;
  }

  .text-input-text {
    @apply font-body;
  }
</style>
