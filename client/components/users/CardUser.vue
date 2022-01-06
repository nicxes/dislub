<template>
  <div class="bg-[#FCFCFC] border-2 border-line rounded-2xl p-4 grid grid-cols-3 md:grid-cols-12 gap-y-2 items-center">
    <div class="col-span-1">
      <img
        :src="user.logo || '/images/dislub-avatar.png'"
        class="border-2 border-line rounded-2xl h-[56px] w-[56px] md:h-[96px] md:w-[96px]"
      >
    </div>

    <div class="order-3 md:order-2 col-span-3 md:col-span-8">
      <div class="flex flex-col-reverse md:flex-row items-start md:items-center">
        <h4 class="text-darked text-xl md:text-2xl font-bold mb-1">
          {{ user.name }}
        </h4>

        <div v-if="user.role === 'ADMIN'" class="mb-1 md:ml-2 md:mb-0">
          <span class="bg-[#8BC7DA] bg-opacity-25 text-[#6E7191] font-medium px-4 py-1 rounded-[40px] flex items-center justify-center">
            <img src="/images/icons/crown.svg" class="mr-2">
            Admin
          </span>
        </div>
      </div>

      <div class="text-darked font-medium mb-2 flex items-center">
        <span class="text-[13px] md:text-base">{{ user.email }}</span>
        <div class="relative clipboard">
          <button class="bg-[#EFF0F6] hover:bg-line ml-2 p-1 rounded-lg transition duration-300 ease-out" @click="clipboard()">
            <img src="/images/icons/copy.svg" class="h-[14px] w-[14px] md:w-auto md:h-auto">
          </button>

          <div class="tooltip absolute bottom-[-45px] left-[-15px] bg-[#4E4B66] py-2 px-3 text-sm text-[#FCFCFC] rounded-2xl opacity-0 transition duration-300 ease-in-out invisible">
            Copiar
          </div>
        </div>
      </div>

      <p class="text-[#6E7191] text-sm font-medium">
        Último inicio de sesión: Hace 2 días
      </p>
    </div>

    <div class="order-2 md:order-3 col-span-2 md:col-span-3 flex items-center justify-end">
      <button class="text-[#4E4B66] flex items-center flex-col justify-center font-medium py-2 px-4 hover:bg-input-placeholder-color hover:bg-opacity-50 rounded-2xl transition duration-300 ease-out" @click="$emit('edit')">
        <img src="/images/icons/edit.svg" class="mb-1 w-6 h-6 md:w-auto md:h-auto">
        <span class="hidden md:block">Editar</span>
      </button>

      <button class="text-[#EB5757] flex items-center flex-col justify-center font-medium py-2 px-4 hover:bg-input-placeholder-color hover:bg-opacity-50 rounded-2xl transition duration-300 ease-out ml-2 md:ml-4" @click="$emit('delete')">
        <img src="/images/icons/trash.svg" class="mb-1 w-6 h-6 md:w-auto md:h-auto">
        <span class="hidden md:block">Eliminar</span>
      </button>

      <button class="text-[#4E4B66] flex items-center flex-col justify-center font-medium py-2 px-4 hover:bg-input-placeholder-color hover:bg-opacity-50 rounded-2xl transition duration-300 ease-out ml-2 md:ml-4">
        <img src="/images/icons/eye.svg" class="mb-1 w-6 h-6 md:w-auto md:h-auto">
        <span class="hidden md:block">Historial</span>
      </button>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    user: {
      type: Object,
      required: true,
    },
  },
  methods: {
    clipboard () {
      navigator.clipboard.writeText(this.user.email)
    },
  },
}
</script>

<style scoped>
.clipboard:hover .tooltip {
  opacity: 1;
  visibility: visible;
}
.clipboard .tooltip:before {
  content: "";
  background: url('/images/union.png') no-repeat;
  position: absolute;
  top: -10px;
  left: 23px;
  height: 12px;
  width: 28px;
  z-index: 1;
}
</style>
