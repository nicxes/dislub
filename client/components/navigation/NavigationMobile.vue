<template>
  <nav class="fixed bottom-0 left-0 right-0 w-full z-50 grid grid-cols-3 items-center gap-3 md:hidden bg-[#FCFCFC] border-t-2 border-line p-2 list-none">
    <li>
      <NavigationMobileItem text="Inicio" to="/dashboard" icon="/images/icons/home.svg" />
    </li>

    <li>
      <NavigationMobileItem text="Productos" to="/products" icon="/images/icons/bag.svg" />
    </li>

    <li>
      <NavigationMobileItem text="Cotizaciones" to="/orders" icon="/images/icons/attach.svg" />
    </li>
  </nav>
</template>
