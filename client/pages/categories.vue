<template>
  <section class="px-4 pb-28 md:pb-4 md:px-6">
    <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-6 mb-9">
      <div class="Search relative">
        <input
          v-model="search"
          type="search"
          placeholder="Buscá por nombre"
          class="w-full py-3 pl-16 pr-6 text-input-placeholder-color border-2 bg-[#FCFCFC] border-line rounded-2xl focus:shadow-none focus:outline-none focus:ring-0 focus:border-line transition duration-300 ease-out"
        >
      </div>

      <div class="flex justify-end">
        <button class="text-white font-medium bg-primary hover:bg-[#184158] rounded-2xl w-full py-3 flex justify-center items-center transition duration-300 ease-out" @click="toggleModal('create')">
          Crear nueva categoría
          <img src="/images/icons/plus.svg" class="ml-2">
        </button>
      </div>
    </div>

    <ul class="grid gap-y-4">
      <li v-for="category in filteredCategories" :key="category.id">
        <CardCategory
          :category="category"
          @refresh-categories="getCategories"
          @edit="toggleModal('edit', category)"
        />
      </li>
    </ul>

    <transition name="fade">
      <div v-if="modal.create" class="fixed z-50 left-0 right-0 top-0 bottom-0 bg-black bg-opacity-30 flex items-end md:items-center justify-center" @click="toggleModal('create')">
        <div class="bg-white rounded-t-3xl md:rounded-3xl p-6 max-w-[471px] w-full" @click.stop>
          <div class="flex items-center justify-between mb-6">
            <h3 class="text-[#14142B] text-2xl font-bold">Crear nueva categoría</h3>

            <div class="cursor-pointer" @click="toggleModal('create')">
              <img src="/images/icons/close.svg">
            </div>
          </div>

          <div class="grid grid-cols-1 mb-9">
            <div>
              <label for="name" class="text-darked font-medium text-sm leading-[24px] mb-1 block">
                Nombre de la categoría:
              </label>

              <input v-model="form.create.name" type="text" placeholder="Ingrese el nombre aquí" class="bg-transparent border-2 border-line rounded-2xl w-full py-3 px-4 focus:ring-0 focus:outline-none focus:shadow-none focus:border-line focus:bg-white">
            </div>
          </div>

          <div class="flex items-center justify-center">
            <button class="bg-primary hover:bg-[#184158] text-white rounded-2xl py-4 px-6 font-semibold text-sm md:text-lg flex items-center justify-center w-full transition duration-300 ease-out" @click="createCategory()">
              Confirmar y crear nueva categoría
              <img src="/images/icons/check.svg" class="ml-2 w-[12px] h-[12px] md:w-auto md:h-auto">
            </button>
          </div>
        </div>
      </div>
    </transition>

    <transition name="fade">
      <div v-if="modal.edit" class="fixed z-50 left-0 right-0 top-0 bottom-0 bg-black bg-opacity-30 flex items-end md:items-center justify-center" @click="toggleModal('edit')">
        <div class="bg-white rounded-t-3xl md:rounded-3xl p-6 max-w-[471px] w-full" @click.stop>
          <div class="flex items-center justify-between mb-6">
            <h3 class="text-[#14142B] text-2xl font-bold">Editar categoría</h3>

            <div class="cursor-pointer" @click="toggleModal('edit')">
              <img src="/images/icons/close.svg">
            </div>
          </div>

          <div class="grid grid-cols-1 mb-9">
            <div>
              <label for="name" class="text-darked font-medium text-sm leading-[24px] mb-1 block">
                Nombre de la categoría:
              </label>

              <input v-model="form.edit.name" type="text" placeholder="Ingrese el nombre aquí" class="bg-transparent border-2 border-line rounded-2xl w-full py-3 px-4 focus:ring-0 focus:outline-none focus:shadow-none focus:border-line focus:bg-white">
            </div>
          </div>

          <div class="flex items-center justify-center">
            <button class="bg-primary hover:bg-[#184158] text-white rounded-2xl py-4 px-6 font-semibold text-sm md:text-lg flex items-center justify-center w-full md:w-auto transition duration-300 ease-out" @click="editCategory()">
              Confirmar
              <img src="/images/icons/check.svg" class="ml-2 w-[12px] h-[12px] md:w-auto md:h-auto">
            </button>
          </div>
        </div>
      </div>
    </transition>
  </section>
</template>

<script>
export default {
  layout: 'dashboard',
  data () {
    return {
      categories: [],
      search: '',
      modal: {
        create: false,
        edit: false,
        delete: false,
      },
      form: {
        create: {
          name: '',
          type: 'PRODUCTS',
        },
        edit: {
          id: '',
          name: '',
          type: 'PRODUCTS',
        },
      },
    }
  },
  computed: {
    filteredCategories () {
      return this.categories.filter((category) => {
        return category.name.toLowerCase().match(this.search.toLowerCase())
      })
    },
  },
  mounted () {
    this.getCategories()
  },
  methods: {
    getCategories () {
      this.$axios.$get('/categories').then((res) => {
        const categories = res.data.filter(category => category.type === 'PRODUCTS')
        this.categories = categories
      }).catch((err) => {
        console.log(err)
      })
    },
    createCategory () {
      this.$axios.$post('/categories', this.form.create).then(() => {
        this.getCategories()
        this.toggleModal('create')
      }).catch((err) => {
        console.log(err)
      })
    },
    editCategory () {
      this.$axios.$put(`/categories/${this.form.edit.id}`, this.form.edit).then(() => {
        this.getCategories()
        this.toggleModal('edit')
      }).catch((err) => {
        console.log(err)
      })
    },
    toggleModal (modal, data) {
      this.modal[modal] = !this.modal[modal]

      if (data)
        this.form.edit = data
    },
  },
}
</script>

<style scoped>
  .Search::before {
    content: '';
    position: absolute;
    left: 24px;
    top: 15px;
    z-index: 10;

    height: 24px;
    width: 24px;

    background: url('/images/icons/search.svg') no-repeat center center;
  }
</style>
