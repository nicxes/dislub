<template>
  <section class="px-4 md:px-6 pb-20">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-9">
      <div class="Search relative col-span-2">
        <input v-model="search" type="search" placeholder="Buscá cualquier producto" class="w-full rounded-2xl border-2 border-line py-3 pl-16 pr-6 placeholder-[#A0A3BD] bg-[#FCFCFC] focus:shadow-none focus:outline-none focus:ring-0 focus:border-line transition duration-300 ease-out">
      </div>

      <div class="relative">
        <button
          type="button"
          class="relative w-full border-line bg-[#FCFCFC] text-[#A0A3BD] border-2 rounded-2xl py-3 px-4 focus:outline-none focus:ring-0 focus:border-line"
          aria-haspopup="listbox"
          aria-expanded="true"
          aria-labelledby="listbox-label"
          @click="select = !select"
        >
          <span class="flex items-center">
            Categoría
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
            v-if="select"
            class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-56 rounded-md py-1 text-base ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm"
            tabindex="-1"
            role="listbox"
            aria-labelledby="listbox-label"
            aria-activedescendant="listbox-option-3"
          >
            <li
              v-for="category in filteredCategories"
              id="listbox-option-0"
              :key="category.id"
              class="cursor-pointer select-none relative py-2 pl-3 pr-9"
              :class="{ 'bg-primary text-white': form.create.category_id === category.id }"
              role="option"
              @click="selectCategory(category.id)"
            >
              <div class="flex items-center">
                <span class="ml-3 block truncate" :class="{ 'font-semibold' : form.create.category_id === category.id }">
                  {{ category.name }}
                </span>
              </div>

              <span v-if="form.create.category_id === category.id" class="text-white absolute inset-y-0 right-0 flex items-center pr-4">
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
              </span>
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
          @click="select = !select"
        >
          <span class="flex items-center">
            Industria
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
            v-if="select"
            class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-56 rounded-md py-1 text-base ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm"
            tabindex="-1"
            role="listbox"
            aria-labelledby="listbox-label"
            aria-activedescendant="listbox-option-3"
          >
            <li
              v-for="category in filteredCategories"
              id="listbox-option-0"
              :key="category.id"
              class="cursor-pointer select-none relative py-2 pl-3 pr-9"
              :class="{ 'bg-primary text-white': form.create.category_id === category.id }"
              role="option"
              @click="selectCategory(category.id)"
            >
              <div class="flex items-center">
                <span class="ml-3 block truncate" :class="{ 'font-semibold' : form.create.category_id === category.id }">
                  {{ category.name }}
                </span>
              </div>

              <span v-if="form.create.category_id === category.id" class="text-white absolute inset-y-0 right-0 flex items-center pr-4">
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
              </span>
            </li>
          </ul>
        </transition>
      </div>
    </div>

    <ul class="grid grid-cols-2 md:grid-cols-7 gap-y-4 gap-x-5 md:gap-6">
      <CardProduct
        v-for="(product, i) in filteredProducts"
        :key="i"
        :product="product"
        :image="`images/products/${randomInt(1, 4)}.png`"
      />
    </ul>
  </section>
</template>

<script>
export default {
  layout: 'dashboard',
  data () {
    return {
      products: [],
      categories: [],
      search: '',
    }
  },
  computed: {
    filteredProducts () {
      return this.products.filter((product) => {
        return product.name.toLowerCase().match(this.search.toLowerCase())
      })
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
