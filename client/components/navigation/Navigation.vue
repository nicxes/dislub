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
          v-if="$store.state.user.data.role === 'ADMIN'"
          icon="users"
          text="Usuarios"
          to="/users"
        />

        <NavigationItem
          v-if="$store.state.user.data.role === 'ADMIN'"
          icon="categories"
          text="Categorías"
          to="/categories"
        />
      </ul>
    </div>

    <Profile />
  </aside>
</template>

<style scoped>
  .Navigation {
    box-shadow: 4px 4px 24px rgba(0, 0, 0, 0.04);
  }
</style>
