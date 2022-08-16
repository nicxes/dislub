<template>
  <section class="px-4 md:px-6 pb-20">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 md:gap-6 pb-6 md:pb-0 border-b-2 md:border-0 border-[#D9DBE9] mb-6 md:mb-9">
      <div class="Search relative md:col-span-2">
        <input v-model="search" type="search" placeholder="Buscá cualquier producto" class="w-full rounded-2xl border-2 border-line py-3 pl-16 pr-6 placeholder-[#A0A3BD] bg-[#FCFCFC] focus:shadow-none focus:outline-none focus:ring-0 focus:border-line transition duration-300 ease-out">
      </div>

      <div class="relative">
        <button
          type="button"
          class="relative w-full border-line bg-[#FCFCFC] text-[#A0A3BD] border-2 rounded-2xl py-3 px-4 focus:outline-none focus:ring-0 focus:border-line"
          aria-haspopup="listbox"
          aria-expanded="true"
          aria-labelledby="listbox-label"
          @click="category = !category"
        >
          <span v-if="selectedCategory === 'Todas'" class="flex items-center">
            Categoría
          </span>

          <span v-else class="flex items-center">
            {{ nameCategorySelected.name }}
          </span>

          <span class="ml-3 absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
            <!-- Heroicon name: solid/selector -->
            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
          </span>
        </button>

        <transition name="fade">
          <ul
            v-if="category"
            class="absolute z-10 mt-1 w-full bg-[#EFF0F7] shadow-lg rounded-2xl p-3 text-base border-2 border-[#D9DBE9] overflow-auto focus:outline-none"
            tabindex="-1"
            role="listbox"
            aria-labelledby="listbox-label"
            aria-activedescendant="listbox-option-3"
          >
            <li
              id="listbox-option-0"
              class="cursor-pointer select-none relative py-1 px-2 rounded-lg text-lg leading-[34px] text-[#6E7191] hover:bg-[#D9DBE9] hover:text-darked transition duration-300 ease-out mb-1"
              :class="{ 'bg-[#D9DBE9] text-darked': selectedCategory === 'Todas' }"
              role="option"
              @click="selectedCategory = 'Todas'"
            >
              Todas
            </li>

            <li
              v-for="(item) in filteredCategories"
              id="listbox-option-0"
              :key="item.id"
              class="cursor-pointer select-none relative py-1 px-2 rounded-lg text-lg leading-[34px] text-[#6E7191] hover:bg-[#D9DBE9] hover:text-darked transition duration-300 ease-out mb-1"
              :class="{ 'bg-[#D9DBE9] text-darked': selectedCategory === item.id }"
              role="option"
              @click="selectedCategory = item.id"
            >
              {{ item.name }}
            </li>
          </ul>
        </transition>
      </div>

      <div class="relative">
        <button
          type="button"
          class="relative w-full border-line bg-[#FCFCFC] text-[#A0A3BD] border-2 rounded-2xl py-3 px-4 focus:outline-none focus:ring-0 focus:border-line"
          aria-haspopup="listbox"
          aria-expanded="true"
          aria-labelledby="listbox-label"
          @click="industry = !industry"
        >
          <span v-if="selectedIndustry === 'Todas'" class="flex items-center">
            Industria
          </span>

          <span v-else class="flex items-center">
            {{ selectedIndustry }}
          </span>

          <span class="ml-3 absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
            <!-- Heroicon name: solid/selector -->
            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
          </span>
        </button>

        <transition name="fade">
          <ul
            v-if="industry"
            class="absolute z-10 mt-1 w-full bg-[#EFF0F7] shadow-lg rounded-2xl p-3 text-base border-2 border-[#D9DBE9] overflow-auto focus:outline-none"
            tabindex="-1"
            role="listbox"
            aria-labelledby="listbox-label"
            aria-activedescendant="listbox-option-3"
          >
            <li
              v-for="(item, index) in industries"
              id="listbox-option-0"
              :key="index"
              class="cursor-pointer select-none relative py-1 px-2 rounded-lg text-lg leading-[34px] text-[#6E7191] hover:bg-[#D9DBE9] hover:text-darked transition duration-300 ease-out mb-1"
              :class="{ 'bg-[#D9DBE9] text-darked': selectedIndustry === item }"
              role="option"
              @click="selectedIndustry = item"
            >
              {{ item }}
            </li>
          </ul>
        </transition>
      </div>
    </div>

    <ul v-if="searchByProductName.length > 0" class="grid grid-cols-1 md:grid-cols-[repeat(auto-fill,220px)] gap-2 justify-between">
      <CardProduct
        v-for="(product, i) in searchByProductName"
        :key="i"
        :product="product"
        :image="`images/products/placeholder.svg`"
      />
    </ul>

    <div v-else class="flex items-center justify-center flex-col max-w-[538px] mx-auto mt-6">
      <img src="/images/notfound.png" class="mb-4">
      <h3 class="text-darked text-2xl font-bold leading-[32px] text-center">No se encontraron resultados para la búsqueda</h3>
    </div>
  </section>
</template>

<script>
export default {
  layout: 'dashboard',
  data () {
    return {
      products: [],
      categories: [],
      industries: [
        'Todas',
        'Aviación',
        'Servicios pesados',
        'Industrias',
        'Marítimo',
        'Motos',
        'Automotor',
      ],
      search: '',

      // Dropdowns
      category: false,
      industry: false,

      selectedIndustry: 'Todas',
      selectedCategory: 'Todas',
    }
  },
  computed: {
    filteredProducts () {
      return this.products.filter((product) => {
        return (product.category_id === this.selectedCategory || this.selectedCategory === 'Todas') && (product.industry === this.selectedIndustry || this.selectedIndustry === 'Todas')
      })
    },
    searchByProductName () {
      return this.filteredProducts.filter((product) => {
        return product.name.toLowerCase().match(this.search.toLowerCase())
      })
    },
    filteredCategories () {
      return this.categories.filter(category => category.type === 'PRODUCTS')
    },
    nameCategorySelected () {
      return this.categories.find(category => category.id === this.selectedCategory)
    },
  },
  mounted () {
    this.getProducts()
    this.getCategories()
    this.getSlug()
  },
  methods: {
    getSlug () {
      const search = this.$router.currentRoute.params.search

      search ? this.search = search : this.search = ''
    },
    getProducts () {
      this.$axios.$get('/products').then((res) => {
        this.products = res.data
      }).catch((err) => {
        console.log(err)
      })
    },
    getCategories () {
      this.$axios.$get('/categories').then((res) => {
        this.categories = res.data
      }).catch((err) => {
        console.log(err)
      })
    },
    randomInt (min, max) {
      return Math.floor(Math.random() * (max - min + 1) + min)
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
