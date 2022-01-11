<template>
  <section class="pb-32 md:pb-20">
    <h3 class="text-darked text-2xl md:text-3xl font-bold md:text-center mb-3 md:mb-4 tracking-[1px]">Últimas cotizaciones</h3>

    <ul class="mb-6">
      <CardOrder v-for="order in lastedOrders" :key="order.id" :order="order" />
    </ul>

    <div v-if="orders.length > 0" class="flex justify-center">
      <NuxtLink to="/orders" class="text-primary font-semibold border-primary border-2 rounded-[40px] hover:border-[#184158] hover:text-[#184158] px-4 py-4 w-96 block text-center transition duration-300">
        Ver historial completo
      </NuxtLink>
    </div>
  </section>
</template>

<script>
export default {
  data () {
    return {
      orders: [],
    }
  },
  computed: {
    lastedOrders () {
      let result

      if (this.orders.length > 3)
        result = this.orders.slice(0, 3)
      else
        result = this.orders

      return result
    },
  },
  mounted () {
    this.getOrders()
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
  },
}
</script>
