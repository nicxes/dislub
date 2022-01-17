<template>
  <section class="px-4 md:px-6 pb-36">
    <div class="grid grid-cols-1 md:grid-cols-4 md:divide-x-2 gap-y-6">
      <div class="order-2 md:order-1 col-span-3 md:pr-8">
        <h5 class="text-darked text-lg mb-4">Productos</h5>

        <ul class="grid grid-cols-1 gap-4 pb-6 md:mb-6 border-b-2 border-line">
          <OrderSimple
            v-for="product in order.orders_products"
            :key="product.id"
            :product="product"
          />
        </ul>
      </div>

      <div class="order-1 md:order-2 md:pl-8">
        <h3 class="text-2xl font-bold mb-2">Detalles</h3>

        <h5 class="text-darked text-sm font-medium mb-1">Empresa:</h5>

        <div class="mb-4 flex items-center">
          <img
            src="https://scontent.fepa8-2.fna.fbcdn.net/v/t1.18169-9/22730494_1499839286771311_6711186237223725316_n.jpg?_nc_cat=104&ccb=1-5&_nc_sid=09cbfe&_nc_ohc=HZE0h1jJW44AX824IwW&_nc_ht=scontent.fepa8-2.fna&oh=00_AT8-7ITpA4PlJOSWZ5IrlCp707pqkKDwY61D9sSKxJ_Ymg&oe=620A1364"
            class="h-8 w-8 rounded-lg border-2 border-line bg-white p-1 mr-2"
          >

          <div class="text-darked font-semibold leading-[28px]">
            {{ order.organization.name }}
          </div>
        </div>

        <h5 class="text-darked text-sm font-medium mb-1">Orden ID:</h5>
        <h6 class="text-darked text-base font-semibold mb-4">
          #{{ order.number }}
        </h6>

        <h5 class="text-darked text-sm font-medium mb-1">Fecha de cotización:</h5>
        <h6 class="text-darked text-base font-semibold">
          {{ formatedDate }}
        </h6>

        <div class="hidden md:block mt-4">
          <button
            class="bg-primary hover:bg-[#184158] text-white font-semibold rounded-2xl w-full py-4 flex items-center justify-center transition duration-300 ease-out"
            :class="{ '!bg-line text-input-placeholder-color cursor-not-allowed' : true }"
            :disabled="true"
          >
            Descargar CSV
            <img src="/images/icons/download-disabled.svg" class="ml-2">
          </button>
        </div>
      </div>

      <div class="order-3 md:hidden">
        <div>
          <button
            class="bg-primary hover:bg-[#184158] text-white text-lg font-semibold rounded-2xl w-full py-4 flex items-center justify-center transition duration-300 ease-out"
            :class="{ '!bg-line text-input-placeholder-color cursor-not-allowed' : true }"
            :disabled="true"
          >
            Descargar CSV
            <img src="/images/icons/download-disabled.svg" class="ml-2">
          </button>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  layout: 'dashboard',
  asyncData ({ $axios, route }) {
    return $axios.get(`/orders/${route.params.slug}`).then((res) => {
      return { order: res.data.data }
    }).catch((error) => {
      throw error
    })
  },
  head () {
    return {
      title: 'Dislub - Orden #' + this.order.number,
    }
  },
  computed: {
    formatedDate () {
      return this.$moment(this.order.created_at).format('DD/MM/YYYY')
    },
  },
}
</script>
