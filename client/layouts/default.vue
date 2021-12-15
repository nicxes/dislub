<template>
  <div>
    <Navbar />
    <Nuxt />
    <ModalRecovery />
  </div>
</template>

<style>
  * {
    @apply font-body
  }
  html, body {
    @apply bg-gray-100 text-gray-600
  }
  .container {
    max-width: 1240px;
  }

  /* Animations */
  /* .fade-leave-active below version 2.1.8 */
  .fade-enter-active, .fade-leave-active {
    transition: opacity .3s;
  }
  .fade-enter, .fade-leave-to {
    opacity: 0;
  }
</style>
