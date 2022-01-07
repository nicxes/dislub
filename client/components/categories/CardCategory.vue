<template>
  <div class="grid grid-cols-4 md:grid-cols-2 items-center bg-[#FCFCFC] border-2 border-line rounded-2xl p-4">
    <div class="col-span-3 md:col-span-1">
      <h4 class="md:text-lg darked font-semibold">
        {{ category.name }}
      </h4>
    </div>

    <div class="flex justify-end">
      <button class="px-2 md:px-4 py-2 rounded-2xl hover:bg-input-background transition duration-300 ease-out" @click="$emit('edit')">
        <img src="/images/icons/edit.svg">
      </button>

      <button class="px-2 md:px-4 py-2 rounded-2xl hover:bg-input-background transition duration-300 ease-out ml-1 md:ml-4" @click="destroy()">
        <img src="/images/icons/trash.svg">
      </button>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    category: {
      type: Object,
      required: true,
    },
  },
  methods: {
    destroy () {
      this.$axios.$delete(`/categories/${this.category.id}`).then((res) => {
        console.log(res)
        this.$emit('refresh-categories')
      }).catch((err) => {
        console.log(err)
      })
    },
  },
}
</script>
