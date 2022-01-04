<template>
  <section class="px-6 pb-28 md:pb-4">
    <h1 class="text-black font-bold text-2xl md:hidden leading-[32px] tracking-[1px] mb-4">
      Historial de cotizaciones
    </h1>

    <div class="bg-[#FCFCFC] grid grid-cols-1 md:grid-cols-2 items-center gap-2 border-2 border-line rounded-2xl p-2 mb-6">
      <button class="bg-background text-primary font-medium py-3 rounded-2xl flex items-center justify-center" @click="orderByDate = true">
        Ordenar por fecha
        <img src="/images/icons/calendar.svg" class="ml-2">
      </button>

      <button class="text-white font-medium bg-primary py-3 rounded-2xl flex items-center justify-center" @click="orderByDate = false">
        Ordenar por cliente
        <img src="/images/icons/user-white.svg" class="ml-2">
      </button>
    </div>

    <div v-if="!orderByDate">
      <div class="mb-7">
        <div class="flex items-center justify-between mb-4">
          <div class="flex items-center">
            <img
              src="https://scontent.fepa8-2.fna.fbcdn.net/v/t1.18169-9/22730494_1499839286771311_6711186237223725316_n.jpg?_nc_cat=104&ccb=1-5&_nc_sid=09cbfe&_nc_ohc=ygORrRK8X0gAX-XECJX&_nc_ht=scontent.fepa8-2.fna&oh=00_AT_mnllb8pogoOM7TdI9R12xAeQCVs64FE3DupqHmzKb6A&oe=61E28664"
              class="h-8 w-8 rounded-lg border-2 border-line bg-white p-1 mr-2"
            >
            <span class="text-darked text-lg font-semibold">
              Lubricentro San Cristobal
            </span>
          </div>

          <div>
            <button class="flex items-center px-3 py-2 text-primary font-semibold text-sm rounded-2xl border-2 border-line hover:bg-line transition duration-300 ease-out" @click="show = !show">
              <img src="/images/icons/arrow-top.svg" class="mr-0 md:mr-2">
              <span class="hidden md:inline">Ver menos</span>
            </button>
          </div>
        </div>

        <transition name="fade">
          <ul v-show="show" class="grid grid-cols-1 gap-4">
            <OrderCardByClient />
            <OrderCardByClient />
            <OrderCardByClient />
          </ul>
        </transition>
      </div>

      <div>
        <div class="flex items-center justify-between mb-4">
          <div class="flex items-center">
            <img
              src="https://scontent.fepa8-2.fna.fbcdn.net/v/t1.18169-9/22730494_1499839286771311_6711186237223725316_n.jpg?_nc_cat=104&ccb=1-5&_nc_sid=09cbfe&_nc_ohc=ygORrRK8X0gAX-XECJX&_nc_ht=scontent.fepa8-2.fna&oh=00_AT_mnllb8pogoOM7TdI9R12xAeQCVs64FE3DupqHmzKb6A&oe=61E28664"
              class="h-8 w-8 rounded-lg border-2 border-line bg-white p-1 mr-2"
            >
            <span class="text-darked text-lg font-semibold">
              Lubricentro San Cristobal
            </span>
          </div>

          <div>
            <button class="flex items-center px-3 py-2 text-primary font-semibold text-sm rounded-2xl border-2 border-line hover:bg-line transition duration-300 ease-out" @click="show2 = !show2">
              <img src="/images/icons/arrow-top.svg" class="mr-0 md:mr-2">
              <span class="hidden md:inline">Ver menos</span>
            </button>
          </div>
        </div>

        <transition name="fade">
          <ul v-show="show2" class="grid grid-cols-1 gap-4">
            <OrderCardByClient />
            <OrderCardByClient />
            <OrderCardByClient />
          </ul>
        </transition>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  layout: 'dashboard',
  data () {
    return {
      orderByDate: false,
      show: true,
      show2: true,
    }
  },
}
</script>
