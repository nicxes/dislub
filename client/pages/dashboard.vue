<template>
  <section class="px-4 md:px-6">
    <Carousel />
    <LastedProducts :w="width" />
    <LastedOrders />
  </section>
</template>

<script>
export default {
  layout: 'dashboard',
  data () {
    return {
      width: null,
    }
  },
  mounted () {
    this.width = window.innerWidth - 270.859
    this.width = this.width - 40

    window.addEventListener('resize', (e) => {
      this.width = window.innerWidth - 270.859
      this.width = this.width - 40
    })
  },
}
</script>
