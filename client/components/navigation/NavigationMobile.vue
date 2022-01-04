<template>
  <nav class="fixed bottom-0 left-0 right-0 w-full z-50 grid Item grid-flow-col items-center gap-3 md:hidden bg-[#FCFCFC] border-t-2 border-line p-2 list-none  overflow-x-auto">
    <li>
      <NavigationMobileItem text="Inicio" to="/dashboard" icon="home" />
    </li>

    <li>
      <NavigationMobileItem text="Productos" to="/products" icon="bag" />
    </li>

    <li>
      <NavigationMobileItem text="Cotizaciones" to="/orders" icon="attach" />
    </li>

    <li>
      <NavigationMobileItem text="Usuarios" to="/users" icon="users" />
    </li>

    <li>
      <NavigationMobileItem text="Categorías" to="/categories" icon="categories" />
    </li>
  </nav>
</template>

<style scoped>
  .Item {
    grid-template-columns: repeat(auto-fill,minmax(111px,1fr));
    grid-auto-columns: minmax(111px,1fr);
  }
</style>
