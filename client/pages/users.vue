<template>
  <section class="px-4 md:px-6 pb-20">
    <h1 class="md:hidden text-2xl font-bold text-black mb-4">
      Usuarios de la plataforma
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-2 mb-6 gap-6">
      <div class="Search relative order-2 md:order-1">
        <input
          v-model="search"
          type="search"
          class="bg-white placeholder-[#A0A3BD] border-2 border-line focus:border-line focus:shadow-none focus:ring-0 rounded-2xl py-3 px-6 pl-16 w-full block ga"
          placeholder="Buscá por nombre o e-mail"
        >
      </div>

      <div class="md:flex md:justify-end order-1 md:order-2">
        <button class="bg-primary hover:bg-[#184158] text-white text-[13px] md:text-base font-semibold rounded-2xl flex items-center justify-center p-3 w-full transition duration-300 ease-out" @click="toggleModal('create')">
          Crear un nuevo usuario
          <img src="/images/icons/user-white.svg" class="ml-2 h-3 w-3 md:w-auto md:h-auto">
        </button>
      </div>
    </div>

    <ul class="grid grid-cols-1 gap-4">
      <CardUser
        v-for="(org) in filteredOrganizations"
        :key="org.id"
        :user="org"
        @edit="toggleModal('edit', org)"
        @delete="destroyOrganization(org)"
      />
    </ul>

    <transition name="fade">
      <div v-if="modal.create" class="absolute z-50 left-0 right-0 top-0 bottom-auto md:bottom-0 bg-black bg-opacity-30 flex items-center justify-center" @click="toggleModal('create')">
        <div class="bg-white p-6 md:rounded-2xl w-full max-w-[870px]" @click.stop>
          <div class="flex items-center justify-between mb-6">
            <h3 class="text-[#14142B] text-2xl font-bold">Crear nuevo usuario</h3>
            <div class="cursor-pointer" @click="toggleModal('create')">
              <img src="/images/icons/close.svg">
            </div>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-9">
            <div>
              <div class="relative bg-background border-2 border-dashed border-line rounded-2xl py-24 px-4 flex items-center justify-center w-full">
                <div class="flex items-center justify-center flex-col text-center">
                  <img src="/images/icons/dropzone.svg" class="mb-3">
                  <p class="text-[#6E7191] text-sm font-medium">Arrastre la imagen aquí, o haga click y seleccione el archivo</p>
                </div>
                <input type="file" class="absolute top-0 left-0 right-0 bottom-0 h-full w-full opacity-0" @change="previewFile($event)">
              </div>
            </div>

            <div>
              <div class="mb-4">
                <label for="company" class="text-darked font-medium text-sm leading-[24px] mb-1 block">Nombre de la empresa:</label>
                <input v-model="form.create.name" type="text" placeholder="Ingrese el nombre aquí" class="bg-transparent border-2 border-line rounded-2xl w-full py-3 px-4 focus:ring-0 focus:outline-none focus:shadow-none focus:border-line focus:bg-white">
              </div>

              <div class="relative mb-4">
                <label for="category" class="text-darked font-medium text-sm leading-[24px] mb-1 block">Categoría de la empresa:</label>

                <button
                  type="button"
                  class="relative w-full border-line bg-transparent border-2 rounded-2xl py-3 px-4 focus:outline-none focus:ring-0 focus:border-line"
                  aria-haspopup="listbox"
                  aria-expanded="true"
                  aria-labelledby="listbox-label"
                  @click="select = !select"
                >
                  <span class="flex items-center">
                    Lubricentros
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

              <div class="mb-4">
                <label for="role" class="text-darked font-medium text-sm leading-[24px] mb-4 block">Rol de usuario:</label>
                <div class="grid grid-cols-2">
                  <button class="text-[#A0A3BD] font-medium flex items-center" @click="form.create.role = 'ADMIN'">
                    <span class="border-2 border-line w-[24px] h-[24px] rounded-full inline-block mr-2">
                      <transition name="fade">
                        <span v-show="form.create.role === 'ADMIN'" class="bg-primary m-[0.15rem] rounded-full w-[16px] h-[16px] inline-block" />
                      </transition>
                    </span>
                    Administrador
                  </button>

                  <button class="text-[#A0A3BD] font-medium flex items-center" @click="form.create.role = 'USER'">
                    <span class="border-2 border-line w-[24px] h-[24px] rounded-full inline-block mr-2">
                      <transition name="fade">
                        <span v-show="form.create.role === 'USER'" class="bg-primary m-[0.15rem] rounded-full w-[16px] h-[16px] inline-block" />
                      </transition>
                    </span>
                    Cliente
                  </button>
                </div>
              </div>

              <div class="mb-4">
                <label for="email" class="text-darked font-medium text-sm leading-[24px] mb-1 block">E-mail de contacto:</label>
                <input v-model="form.create.email" type="email" placeholder="Ingrese el correo electrónico aquí" class="bg-transparent border-2 border-line rounded-2xl w-full py-3 px-4 focus:ring-0 focus:outline-none focus:shadow-none focus:border-line focus:bg-white">
              </div>

              <div class="mb-4">
                <label for="phone" class="text-darked font-medium text-sm leading-[24px] mb-1 block">Teléfono:</label>
                <input v-model="form.create.phone" type="tel" placeholder="Ingrese el número de teléfono aquí" class="bg-transparent border-2 border-line rounded-2xl w-full py-3 px-4 focus:ring-0 focus:outline-none focus:shadow-none focus:border-line focus:bg-white">
              </div>

              <div class="mb-4">
                <label for="pin" class="text-darked font-medium text-sm leading-[24px] mb-1 block">PIN:</label>
                <input v-model="form.create.pin" type="password" placeholder="Ingrese el PIN de ingreso de 4 dígitos" class="bg-transparent border-2 border-line rounded-2xl w-full py-3 px-4 focus:ring-0 focus:outline-none focus:shadow-none focus:border-line focus:bg-white">
              </div>
            </div>
          </div>

          <div class="flex items-center justify-center">
            <button class="bg-primary hover:bg-[#184158] text-white rounded-2xl py-4 px-6 font-semibold text-sm md:text-lg flex items-center justify-center w-full md:w-auto transition duration-300 ease-out" @click="createOrganization()">
              Confirmar y crear nuevo usuario
              <img src="/images/icons/check.svg" class="ml-2">
            </button>
          </div>
        </div>
      </div>
    </transition>

    <transition name="fade">
      <div v-if="modal.edit" class="absolute z-50 left-0 right-0 top-0 bottom-auto md:bottom-0 bg-black bg-opacity-30 flex items-center justify-center" @click="toggleModal('edit')">
        <div class="bg-white p-6 md:rounded-2xl w-full max-w-[870px]" @click.stop>
          <div class="flex items-center justify-between mb-6">
            <h3 class="text-[#14142B] text-2xl font-bold">Editar usuario</h3>
            <div class="cursor-pointer" @click="toggleModal('edit')">
              <img src="/images/icons/close.svg">
            </div>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-9">
            <div>
              <div v-if="form.edit.logo || true" class="border-2 border-line rounded-2xl px-7 py-7 flex items-center justify-center">
                <img src="/images/dislub-avatar.png" class="w-full">
              </div>

              <div v-else class="bg-background border-2 border-dashed border-line rounded-2xl py-24 px-4 flex items-center justify-center w-full">
                <div class="flex items-center justify-center flex-col text-center">
                  <img src="/images/icons/dropzone.svg" class="mb-3">
                  <p class="text-[#6E7191] text-sm font-medium">Arrastre la imagen aquí, o haga click y seleccione el archivo</p>
                </div>
              </div>
            </div>

            <div>
              <div class="mb-4">
                <label for="company" class="text-darked font-medium text-sm leading-[24px] mb-1 block">Nombre de la empresa:</label>
                <input v-model="form.edit.name" type="text" placeholder="Ingrese el nombre aquí" class="bg-transparent border-2 border-line rounded-2xl w-full py-3 px-4 focus:ring-0 focus:outline-none focus:shadow-none focus:border-line focus:bg-white">
              </div>

              <div class="relative mb-4">
                <label for="category" class="text-darked font-medium text-sm leading-[24px] mb-1 block">Categoría de la empresa:</label>

                <button
                  type="button"
                  class="relative w-full border-line bg-transparent border-2 rounded-2xl py-3 px-4 focus:outline-none focus:ring-0 focus:border-line"
                  aria-haspopup="listbox"
                  aria-expanded="true"
                  aria-labelledby="listbox-label"
                  @click="select = !select"
                >
                  <span class="flex items-center">
                    Lubricentros
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
                      :class="{ 'bg-primary text-white': form.edit.category_id === category.id }"
                      role="option"
                      @click="selectCategory(category.id)"
                    >
                      <div class="flex items-center">
                        <span class="ml-3 block truncate" :class="{ 'font-semibold' : form.edit.category_id === category.id }">
                          {{ category.name }}
                        </span>
                      </div>

                      <span v-if="form.edit.category_id === category.id" class="text-white absolute inset-y-0 right-0 flex items-center pr-4">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                          <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                      </span>
                    </li>
                  </ul>
                </transition>
              </div>

              <div class="mb-4">
                <label for="role" class="text-darked font-medium text-sm leading-[24px] mb-4 block">Rol de usuario:</label>
                <div class="grid grid-cols-2">
                  <button class="text-[#A0A3BD] font-medium flex items-center" @click="form.edit.role = 'ADMIN'">
                    <span class="border-2 border-line w-[24px] h-[24px] rounded-full inline-block mr-2">
                      <transition name="fade">
                        <span v-show="form.edit.role === 'ADMIN'" class="bg-primary m-[0.15rem] rounded-full w-[16px] h-[16px] inline-block" />
                      </transition>
                    </span>
                    Administrador
                  </button>

                  <button class="text-[#A0A3BD] font-medium flex items-center" @click="form.edit.role = 'USER'">
                    <span class="border-2 border-line w-[24px] h-[24px] rounded-full inline-block mr-2">
                      <transition name="fade">
                        <span v-show="form.edit.role === 'USER'" class="bg-primary m-[0.15rem] rounded-full w-[16px] h-[16px] inline-block" />
                      </transition>
                    </span>
                    Cliente
                  </button>
                </div>
              </div>

              <div class="mb-4">
                <label for="email" class="text-darked font-medium text-sm leading-[24px] mb-1 block">E-mail de contacto:</label>
                <input v-model="form.edit.email" type="email" placeholder="Ingrese el correo electrónico aquí" class="bg-transparent border-2 border-line rounded-2xl w-full py-3 px-4 focus:ring-0 focus:outline-none focus:shadow-none focus:border-line focus:bg-white">
              </div>

              <div class="mb-4">
                <label for="phone" class="text-darked font-medium text-sm leading-[24px] mb-1 block">Teléfono:</label>
                <input v-model="form.edit.phone" type="tel" placeholder="Ingrese el número de teléfono aquí" class="bg-transparent border-2 border-line rounded-2xl w-full py-3 px-4 focus:ring-0 focus:outline-none focus:shadow-none focus:border-line focus:bg-white">
              </div>

              <div class="mb-4">
                <label for="pin" class="text-darked font-medium text-sm leading-[24px] mb-1 block">PIN:</label>
                <input v-model="form.edit.pin" type="password" placeholder="Ingrese el PIN de ingreso de 4 dígitos" class="bg-transparent border-2 border-line rounded-2xl w-full py-3 px-4 focus:ring-0 focus:outline-none focus:shadow-none focus:border-line focus:bg-white">
              </div>
            </div>
          </div>

          <div class="flex items-center justify-center">
            <button class="bg-primary hover:bg-[#184158] text-white rounded-2xl py-4 px-6 font-semibold text-lg flex items-center justify-center w-full md:w-auto transition duration-300 ease-out">
              Confirmar
              <img src="/images/icons/check.svg" class="ml-2">
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
      organizations: [],
      categories: [],
      search: '',
      select: false,
      modal: {
        create: false,
        edit: false,
        delete: false,
      },
      form: {
        create: {
          logo: null,
          name: '',
          email: '',
          phone: '',
          pin: '',
          category_id: '',
          role: 'USER',
        },
        edit: {
          name: '',
          email: '',
          phone: '',
          pin: '',
          category_id: '',
          role: '',
        },
      },
    }
  },
  computed: {
    filteredOrganizations () {
      return this.organizations.filter((org) => {
        return org.name.toLowerCase().match(this.search.toLowerCase()) || org.email.toLowerCase().match(this.search.toLowerCase())
      })
    },
    filteredCategories () {
      return this.categories.filter(category => category.type === 'ORGANIZATIONS')
    },
  },
  mounted () {
    this.getOrganizations()
    this.getCategories()
  },
  methods: {
    getOrganizations () {
      this.$axios.$get('organizations').then((res) => {
        this.organizations = res.data
      }).catch((err) => {
        console.log(err)
      })
    },
    getCategories () {
      this.$axios.$get('categories').then((res) => {
        this.categories = res.data
      }).catch((err) => {
        console.log(err)
      })
    },
    createOrganization () {
      this.$axios.$post('organizations', this.form.create).then(() => {
        this.getOrganizations()
        this.toggleModal('create')
      }).catch((err) => {
        console.log(err)
      })
    },
    destroyOrganization (org) {
      this.$axios.$delete(`organizations/${org.id}`).then(() => {
        this.getOrganizations()
      }).catch((err) => {
        console.log(err)
      })
    },
    toggleModal (modal, data) {
      this.modal[modal] = !this.modal[modal]

      if (data)
        this.form.edit = data
    },
    previewFile (event) {
      console.log(event.target.files[0])
      this.form.create.logo = event.target.files[0]
    },
    selectCategory (id) {
      this.form.create.category_id = id
      this.select = false
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
