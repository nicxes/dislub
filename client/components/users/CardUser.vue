<template>
  <div class="bg-[#FCFCFC] border-2 border-line rounded-2xl p-4 grid grid-cols-2 md:grid-cols-12 gap-y-2 items-center">
    <div>
      <img
        :src="user.logo || '/images/dislub-avatar.png'"
        class="border-2 border-line rounded-2xl h-[56px] w-[56px] md:h-[96px] md:w-[96px]"
      >
    </div>

    <div class="order-3 md:order-2 col-span-2 md:col-span-8">
      <h4 class="text-darked text-xl md:text-2xl font-bold mb-1">
        {{ user.name }}
      </h4>

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

    <div class="order-2 md:order-3">
      3
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
