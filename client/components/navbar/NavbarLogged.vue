<template>
  <nav class="relative hidden md:flex items-center justify-between w-full p-6">
    <Title v-if="slug === 'cart'" title="Resumen de su cotización" />
    <Title v-else-if="slug === 'products'" title="Productos" />
    <Title v-else-if="slug === 'users'" title="Usuarios de la plataforma" />
    <Title v-else-if="slug === 'categories'" title="Categorías de producto" />
    <Title v-else-if="slug === 'orders'" title="Historial de cotizaciones" />
    <Search v-else />

    <Cart v-if="slug != 'cart'" />
    <EmptyCart v-else />
  </nav>
</template>

<script>
export default {
  computed: {
    slug () {
      return this.$route.name
    },
  },
}
</script>
