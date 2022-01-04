<template>
  <aside class="Navigation hidden md:flex sticky top-0 left-0 h-screen bg-white flex-col justify-between p-6 w-64">
    <div>
      <div class="mb-16">
        <Logo />
      </div>

      <ul>
        <NavigationItem
          icon="home"
          text="Inicio"
          to="/dashboard"
        />

        <NavigationItem
          icon="bag"
          text="Productos"
          to="/products"
        />

        <NavigationItem
          icon="attach"
          text="Cotizaciones"
          to="/orders"
        />

        <NavigationItem
          icon="users"
          text="Usuarios"
          to="/users"
        />

        <NavigationItem
          icon="categories"
          text="Categorías"
          to="/categories"
        />
      </ul>
    </div>

    <NuxtLink to="/cart">
      <div class="bg-primary-yellow text-white rounded-xl px-3 py-3">
        <h4 class="font-medium text-sm mb-1 flex items-center">
          <img src="/images/icons/cart.svg" class="mr-2">
          Cotización actual:
        </h4>
        <h5 class="font-semibold text-lg tracking-[0.75px]">2 productos</h5>
      </div>
    </NuxtLink>
  </aside>
</template>

<style scoped>
  .Navigation {
    box-shadow: 4px 4px 24px rgba(0, 0, 0, 0.04);
  }
</style>
