<template>
  <li class="card relative grid grid-cols-6 gap-3 bg-[#FCFCFC] border-2 border-background rounded-2xl p-4 items-baseline">
    <div>
      <img src="/images/products/1.png" alt="" class="border-2 border-line rounded-2xl p-4">
    </div>

    <div class="col-span-4">
      <h5 class="text-darked font-semibold mb-1 uppercase">MOBIL DELVAC 1 5W-40</h5>
      <h6 class="text-[#6E7191] text-sm">2 Litros, 40W</h6>
    </div>

    <div class="text-center">
      <h5 class="text-[#6E7191] text-sm font-medium mb-1">Cantidad:</h5>
      <span class="text-primary text-lg font-semibold bg-[#EFF0F6] rounded-2xl px-6 py-4 flex items-center justify-center">
        118
      </span>
    </div>

    <div class="absolute top-0 right-0 left-0 bottom-0 h-full w-full z-10 bg-line flex items-center justify-center rounded-2xl opacity-0 hover:opacity-100 transition duration-300 ease-in-out cursor-pointer">
      <ul class="flex items-center justify-center">
        <button class="text-[#4E4B66] font-semibold flex flex-col justify-center items-center mr-2 px-4 py-2 hover:bg-input-placeholder-color transition duration-300 ease-in-out rounded-2xl">
          <img src="/images/icons/edit.svg" class="mb-1">
          Editar cantidad
        </button>

        <button class="text-[#EB5757] font-semibold flex flex-col justify-center items-center ml-2 px-4 py-2 hover:bg-input-placeholder-color transition duration-300 ease-in-out rounded-2xl">
          <img src="/images/icons/trash.svg" class="mb-1">
          Eliminar
        </button>
      </ul>
    </div>
  </li>
</template>

<style scoped>
  .card {
    box-shadow: 4px 4px 24px rgba(0, 0, 0, 0.04);
  }
</style>
