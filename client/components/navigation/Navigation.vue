<template>
  <aside class="Navigation sticky top-0 left-0 h-screen bg-white flex flex-col justify-between p-6 w-64">
    <div>
      <div class="mb-16">
        <Logo />
      </div>

      <ul>
        <NavigationItem
          icon="/images/icons/home.svg"
          text="Inicio"
          to="/dashboard"
        />

        <NavigationItem
          icon="/images/icons/bag.svg"
          text="Productos"
          to="/products"
        />

        <NavigationItem
          icon="/images/icons/attach.svg"
          text="Cotizaciones"
          to="/orders"
        />

        <NavigationItem
          icon="/images/icons/users.svg"
          text="Usuarios"
          to="/users"
        />

        <NavigationItem
          icon="/images/icons/categories.svg"
          text="Categorías"
          to="/categories"
        />
      </ul>
    </div>

    <div class="bg-primary-yellow text-white rounded-xl px-3 py-3">
      <h4 class="font-medium text-sm mb-1 flex items-center">
        <img src="images/icons/cart.svg" class="mr-2">
        Cotización actual:
      </h4>
      <h5 class="font-semibold text-lg tracking-[0.75px]">2 productos</h5>
    </div>
  </aside>
</template>

<style scoped>
  .Navigation {
    box-shadow: 4px 4px 24px rgba(0, 0, 0, 0.04);
  }
</style>
