<template>
  <div class="relative min-h-screen flex">
    <Navigation />
    <div class="w-full">
      <NavbarLogged />
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

    /* Animations */
  /* .fade-leave-active below version 2.1.8 */
  .fade-enter-active, .fade-leave-active {
    transition: opacity .3s;
  }
  .fade-enter, .fade-leave-to {
    opacity: 0;
  }

  .fade-delay-enter-active, .fade-delay-leave-active {
    transition: opacity .3s;
    transition-delay: 4s;
  }
  .fade-delay-enter, .fade-delay-leave-to {
    opacity: 0;
  }
</style>
