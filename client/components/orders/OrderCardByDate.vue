<template>
  <div class="grid grid-cols-1 md:grid-cols-2 gap-y-4 items-center border-2 border-line bg-[#FCFCFC] rounded-2xl p-4">
    <div class="text-sm text-[#6E7191] font-medium">
      <div v-if="$store.state.user.data.role === 'ADMIN'" class="flex items-center mb-2">
        <img
          src="https://scontent.fepa8-2.fna.fbcdn.net/v/t1.18169-9/22730494_1499839286771311_6711186237223725316_n.jpg?_nc_cat=104&ccb=1-5&_nc_sid=09cbfe&_nc_ohc=ygORrRK8X0gAX-XECJX&_nc_ht=scontent.fepa8-2.fna&oh=00_AT_mnllb8pogoOM7TdI9R12xAeQCVs64FE3DupqHmzKb6A&oe=61E28664"
          class="h-8 w-8 rounded-lg border-2 border-line bg-white p-1 mr-2"
        >
        <span class="text-darked text-lg font-semibold">
          Lubricentro San Cristobal
        </span>
      </div>
      <h5 class="mb-4 md:mb-2 leading-[24px]">Fecha de cotización: {{ formatedDate }}</h5>
      <h5 class="leading-[24px]">
        Productos:
        <span class="text-primary text-lg px-[18px] py-2 rounded-2xl font-semibold bg-input-background ml-1 leading-[18px]">
          {{ order.total_products }}
        </span>
      </h5>
    </div>

    <div class="flex justify-center md:justify-end">
      <NuxtLink :to="'/orders/' + order.id" class="py-2 md:py-3 px-4 font-medium text-[13px] rounded-2xl flex flex-col justify-center items-center transition duration-300 ease-out hover:bg-input-placeholder-color hover:bg-opacity-50">
        <img src="/images/icons/eye.svg" class="mb-1">
        Ver
      </NuxtLink>

      <button class="py-2 md:py-3 px-4 font-medium text-[13px] rounded-2xl flex flex-col justify-center items-center ml-4 transition duration-300 ease-out hover:bg-input-placeholder-color hover:bg-opacity-50">
        <img src="/images/icons/download.svg" class="mb-1">
        Descargar CSV
      </button>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    order: {
      type: Object,
      required: true,
    },
  },
  computed: {
    formatedDate () {
      return this.$moment(this.order.created_at).format('DD/MM/YYYY')
    },
  },
}
</script>
