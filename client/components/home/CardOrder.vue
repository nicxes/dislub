<template>
  <li class="md:border-b-2 md:border-line pb-4 md:py-4">
    <NuxtLink to="/cart">
      <article class="Card flex items-center justify-between p-4 md:p-6 border-2 border-[#EFF0F6] md:border-transparent md:hover:border-[#EFF0F7] rounded-2xl bg-white md:bg-transparent md:hover:bg-white transition duration-300 cursor-pointer">
        <div>
          <h5 class="text-darked md:text-lg font-semibold mb-1 md:mb-2 cutted">Viernes 3 de Diciembre</h5>
          <h6 class="text-[#6E7191] text-sm font-medium mb-2">3/12/2021, 14:58hs</h6>

          <p class="text-primary text-sm font-medium underline md:hidden">
            Ver detalle
          </p>
        </div>

        <div class="flex flex-col md:flex-row items-center bg-[#F7F7FC] md:bg-transparent rounded-2xl py-4 px-3 md:p-0 text-primary font-semibold md:text-lg">
          <span class="md:mr-1">26</span>
          Productos
          <img src="/images/icons/arrow-right.svg" class="hidden md:inline-block ml-8">
        </div>
      </article>
    </NuxtLink>
  </li>
</template>

<style scoped>
  .Card:hover {
    box-shadow: 4px 4px 24px rgba(0, 0, 0, 0.04);
  }
  @media only screen and (max-width: 425px) {
    .cutted {
      text-overflow: ellipsis;
      overflow: hidden;
      width: 160px;
      height: 1.2em;
      white-space: nowrap;
    }
  }
</style>
