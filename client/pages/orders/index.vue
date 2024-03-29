<template>
  <section class="px-4 md:px-6 pb-28 md:pb-4">
    <h1 class="text-black font-bold text-2xl md:hidden leading-[32px] tracking-[1px] mb-4">
      Historial de cotizaciones
    </h1>

    <div v-if="$store.state.user.data.role === 'ADMIN'" class="bg-[#FCFCFC] grid grid-cols-1 md:grid-cols-2 items-center gap-2 border-2 border-line rounded-2xl p-2 mb-6">
      <button
        class="bg-background text-primary font-medium py-3 rounded-2xl flex items-center justify-center transition duration-300 ease-in-out btna"
        :class="{ '!bg-primary text-white active': orderByDate }"
        @click="orderByDate = true"
      >
        Ordenar por fecha
        <svg
          width="25"
          height="24"
          viewBox="0 0 25 24"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
          class="ml-2"
        >
          <rect
            x="2.5"
            y="3"
            width="20"
            height="19"
            rx="3"
            stroke-width="2"
          />
          <path d="M7.5 1V3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          <path d="M17.5 1V3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          <path d="M2.5 8H22.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          <path d="M7 13H8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          <path d="M12 13H13" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          <path d="M17 13H18" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          <path d="M7 17H8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          <path d="M12 17H13" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          <path d="M17 17H18" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
      </button>

      <button
        class="text-primary font-medium bg-background py-3 rounded-2xl flex items-center justify-center transition duration-300 ease-in-out btna"
        :class="{ '!bg-primary text-white active': !orderByDate }"
        @click="orderByDate = false"
      >
        Ordenar por cliente
        <svg
          width="24"
          height="24"
          viewBox="0 0 24 24"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
          class="ml-2"
        >
          <path d="M3 21.5L3.16547 20.4362C3.37405 19.0954 4.24842 17.9469 5.54504 17.5466C7.13654 17.0553 9.49052 16.5 12 16.5C14.5095 16.5 16.8635 17.0553 18.455 17.5466C19.7516 17.9469 20.6259 19.0954 20.8345 20.4362L21 21.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          <path d="M12 12C14.7614 12 17 9.76142 17 7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7C7 9.76142 9.23858 12 12 12Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
      </button>
    </div>

    <div v-if="!orderByDate">
      <div v-for="organization in ordersByOrgs" :key="organization.id" class="mb-7">
        <div class="flex items-center justify-between mb-4">
          <div class="flex items-center">
            <img
              src="/images/dislub-avatar.png"
              class="h-8 w-8 rounded-lg border-2 border-line bg-white p-1 mr-2"
            >
            <span class="text-darked text-lg font-semibold">
              {{ organization.name }}
            </span>
          </div>

          <div>
            <button class="flex items-center px-3 py-2 text-primary font-semibold text-sm rounded-2xl border-2 border-line hover:bg-line transition duration-300 ease-out" @click="organization.show = !organization.show">
              <img
                src="/images/icons/arrow-top.svg"
                class="mr-0 md:mr-2 transition duration-300 ease-out"
                :class="{ 'rotate-180': !organization.show }"
              >

              <span v-if="organization.show" class="hidden md:inline">
                Ver menos
              </span>

              <span v-else class="hidden md:inline">
                Ver más
              </span>
            </button>
          </div>
        </div>

        <transition name="fade">
          <ul v-show="organization.show" class="grid grid-cols-1 gap-4">
            <OrderCardByClient v-for="order in organization.orders" :key="order.id" :order="order" />
          </ul>
        </transition>
      </div>
    </div>

    <div v-else>
      <div class="mb-7">
        <div class="flex items-center justify-between mb-4">
          <h5 class="text-darked text-lg font-semibold">
            Recientes
          </h5>

          <div>
            <button class="flex items-center px-3 py-2 text-primary font-semibold text-sm rounded-2xl border-2 border-line hover:bg-line transition duration-300 ease-out" @click="orderByNew = !orderByNew">
              <img
                src="/images/icons/arrow-top.svg"
                class="mr-0 md:mr-2 transition duration-300 ease-out"
                :class="{ 'rotate-180': !orderByNew }"
              >

              <span v-if="orderByNew" class="hidden md:inline">
                Ver antiguos
              </span>

              <span v-else class="hidden md:inline">
                Ver recientes
              </span>
            </button>
          </div>
        </div>

        <transition name="fade">
          <ul class="grid grid-cols-1 gap-4">
            <OrderCardByDate v-for="order in reverseOrders" :key="order.id" :order="order" />
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
      orderByDate: true,
      orders: [],
      ordersByOrgs: [],
      orderByNew: true,
    }
  },
  computed: {
    reverseOrders () {
      const orders = this.orders

      if (this.orderByNew)
        orders.sort((a, b) => {
          return new Date(b.created_at) - new Date(a.created_at)
        })
      else
        orders.sort((a, b) => {
          return new Date(a.created_at) - new Date(b.created_at)
        })

      return orders
    },
  },
  mounted () {
    this.getOrders()
    this.getOrdersFromOrganizations()
  },
  methods: {
    getOrders () {
      this.$axios.get(`/organizations/orders/${this.$store.state.user.data.id}`)
        .then((res) => {
          this.orders = res.data.data
        })
        .catch((err) => {
          console.log(err)
        })
    },
    getOrdersFromOrganizations () {
      this.$axios.get('/organizations/orders')
        .then((res) => {
          const data = res.data.data

          data.forEach((item) => {
            item.show = true
          })

          this.ordersByOrgs = data
        })
        .catch((err) => {
          console.log(err)
        })
    },
  },
}
</script>

<style scoped>
  .btna svg {
    stroke: #3B89A1;
  }
  .btna.active svg {
    stroke: #fff !important;
  }
</style>
