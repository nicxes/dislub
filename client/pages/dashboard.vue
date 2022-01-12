<template>
  <section class="px-4 md:px-6">
    <Carousel :w="width" />
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
    this.setWidth()
    window.addEventListener('resize', (e) => {
      this.setWidth()
    })
  },
  methods: {
    setWidth () {
      if (window.innerWidth > 426) {
        this.width = window.innerWidth - 270.859
        this.width = this.width - 40
      }
    },
  },
}
</script>
