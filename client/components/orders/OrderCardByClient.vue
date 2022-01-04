<template>
  <NuxtLink to="/">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-y-4 items-center border-2 border-line bg-[#FCFCFC] rounded-2xl p-4">
      <div class="text-sm text-[#6E7191] font-medium">
        <h5 class="mb-4 md:mb-2 leading-[24px]">Fecha de cotización: 22/12/21</h5>
        <h5 class="leading-[24px]">Productos: <span class="text-primary text-lg px-[18px] py-2 rounded-2xl font-semibold bg-input-background ml-1 leading-[18px]">118</span></h5>
      </div>

      <div class="flex justify-center md:justify-end">
        <button class="py-2 md:py-3 px-4 font-medium text-[13px] rounded-2xl flex flex-col justify-center items-center transition duration-300 ease-out hover:bg-input-placeholder-color hover:bg-opacity-50">
          <img src="/images/icons/eye.svg" class="mb-1">
          Ver
        </button>

        <button class="py-2 md:py-3 px-4 font-medium text-[13px] rounded-2xl flex flex-col justify-center items-center ml-4 transition duration-300 ease-out hover:bg-input-placeholder-color hover:bg-opacity-50">
          <img src="/images/icons/download.svg" class="mb-1">
          Descargar CSV
        </button>
      </div>
    </div>
  </NuxtLink>
</template>
