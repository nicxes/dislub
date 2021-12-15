<template>
  <main class="h-fullscreen flex items-center justify-center">
    <div class="container mx-auto text-center">
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

        <button class="text-primary font-bold" @click="openModal()">
          Olvidé mi PIN
        </button>
      </div>
    </div>
  </main>
</template>

<script>
export default {
  data () {
    return {
      form: {
        code: '',
        loading: false,
        success: false,
        error: false,
      },
    }
  },
  methods: {
    openModal () {
      this.$store.commit('recovery/toggle')
    },
    tapCode (value) {
      if (this.form.code.length < 4) {
        this.form.code = this.form.code + value
        if (this.form.code.length === 4) {
          this.form.loading = true
          this.$axios.get('/organizations/auth/' + this.form.code).then((res) => {
            if (res.data.data) {
              this.form.success = true
              localStorage.setItem('dislub-auth', JSON.stringify(res.data.data))
              this.$router.push('/dashboard')
            } else
              this.form.error = true
          }).catch((err) => {
            console.log(err)
            this.form.loading = false
            this.form.error = true
          })
        }
      }
    },
  },
}
</script>

<style scoped>
  .h-fullscreen {
    height: calc( 100vh - 97px );
  }
</style>
