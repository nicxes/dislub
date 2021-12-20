<template>
  <main class="h-fullscreen flex items-center justify-center">
    <transition name="fade">
      <div v-if="!form.complete" class="container mx-auto text-center">
        <h1 class="text-darked text-2xl md:text-4xl font-bold mb-6">
          Ingresá tu PIN de 4 dígitos
        </h1>

        <div class="max-w-xs mx-auto">
          <input
            v-model="form.code"
            type="password"
            placeholder="Ingresa aquí tu PIN"
            class="
              bg-input-background rounded-2xl border-0 px-6 py-3 mb-6 focus:outline-none focus:shadow-none focus:ring-transparent
              text-input-text font-bold
              placeholder-text-input-text placeholder-font-bold placeholder-input-placeholder-color
            "
            disabled
          >

          <div v-if="form.error" class="mb-6">
            <p class="text-error text-sm font-medium">El PIN es inválido. Intentá nuevamente</p>
          </div>

          <div class="grid grid-cols-3 gap-6 mb-6">
            <button
              v-for="(value, i) in 9"
              :key="i"
              class="h-20 w-20 flex items-center justify-center border-2 border-primary rounded-full text-primary text-2xl font-bold hover:bg-primary hover:text-white disabled:opacity-50 disabled:hover:bg-transparent disabled:hover:text-primary disabled:cursor-not-allowed transition duration-300 ease-in-out"
              :disabled="form.loading"
              @click="tapCode(value.toString())"
            >
              {{ value }}
            </button>
          </div>

          <div class="flex justify-center mb-16">
            <button
              class="h-20 w-20 flex items-center justify-center border-2 border-primary rounded-full text-primary text-2xl font-bold hover:bg-primary hover:text-white disabled:opacity-50 disabled:hover:bg-transparent disabled:hover:text-primary disabled:cursor-not-allowed transition duration-300 ease-in-out"
              :disabled="form.loading"
              @click="tapCode('0')"
            >
              0
            </button>
          </div>

          <button class="text-primary font-bold disabled:cursor-not-allowed disabled:opacity-50" :disabled="form.loading" @click="openModal()">
            Olvidé mi PIN
          </button>
        </div>
      </div>
    </transition>

    <transition name="fade">
      <div v-if="form.success">
        <h1 class="text-darked text-2xl md:text-4xl font-bold mb-6">
          ¡Bienvenidos Lubricentro San Cristóbal!
        </h1>

        <div class="flex">
          <div class="bg-white p-8 mx-auto border-2 border-line rounded-[36px]">
            <img
              src="https://scontent.fepa8-2.fna.fbcdn.net/v/t1.18169-9/22730494_1499839286771311_6711186237223725316_n.jpg?_nc_cat=104&ccb=1-5&_nc_sid=09cbfe&_nc_ohc=ygORrRK8X0gAX-XECJX&_nc_ht=scontent.fepa8-2.fna&oh=00_AT_mnllb8pogoOM7TdI9R12xAeQCVs64FE3DupqHmzKb6A&oe=61E28664"
              class="w-40 h-40"
            >
          </div>
        </div>
      </div>
    </transition>
  </main>
</template>

<script>
export default {
  data () {
    return {
      form: {
        code: '',
        complete: false,
        loading: false,
        success: false,
        error: false,
      },
    }
  },
  mounted () {
    window.addEventListener('keydown', (e) => {
      if (!isNaN(e.key) && this.form.code.length < 4) {
        this.form.code = this.form.code + e.key
        if (this.form.code.length === 4) {
          this.getOrganization()
          window.removeEventListener('keydown', this.keydown)
        }
      }
    })
  },
  methods: {
    openModal () {
      this.$store.commit('recovery/toggle')
    },
    tapCode (value) {
      if (this.form.code.length < 4) {
        this.form.code = this.form.code + value
        if (this.form.code.length === 4)
          this.getOrganization()
      }
    },
    getOrganization () {
      this.form.loading = true
      this.$axios.get('/organizations/auth/' + this.form.code).then((res) => {
        if (res.data.data) {
          this.form.complete = true
          localStorage.setItem('dislub-auth', JSON.stringify(res.data.data))

          setTimeout(() => {
            this.form.success = true
          }, 1000)

          setTimeout(() => {
            this.$router.push('/dashboard')
          }, 5000)
        } else {
          this.form.code = ''
          this.form.error = true
          this.form.loading = false
        }
      }).catch((err) => {
        console.log(err)
        this.form.code = ''
        this.form.loading = false
        this.form.error = true
      })
    },
  },
}
</script>

<style scoped>
  .h-fullscreen {
    height: calc( 100vh - 97px );
  }
</style>
