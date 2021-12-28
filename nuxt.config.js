
export default {
  /*
  ** Nuxt.js root directory
  ** See https://nuxtjs.org/api/configuration-srcdir/
  */
  srcDir: 'client/',
  /*
  ** Nuxt target
  ** See https://nuxtjs.org/api/configuration-target
  */
  target: 'server',
  /*
  ** The env property
  ** See https://nuxtjs.org/docs/configuration-glossary/configuration-env/
  */
  env: {
    APP_NAME: process.env.APP_NAME || 'Nuxt.js App',
  },
  /*
  ** Headers of the page
  ** See https://nuxtjs.org/api/configuration-head
  */
  head: {
    title: process.env.APP_NAME || '',
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: process.env.npm_package_description || '' },
    ],
    link: [
      { rel: 'icon', type: 'image/png', href: '/favicon.png' },
    ],
    script: [
      { src: '//cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.11/lottie.min.js ', async: true },
    ],
  },
  /*
  ** Global CSS
  */
  css: [
  ],
  /*
  ** Plugins to load before mounting the App
  ** https://nuxtjs.org/guide/plugins
  */
  plugins: [
    '@/plugins/utils',
    '@/plugins/axios',
    '@/plugins/icon',
  ],
  /*
  ** Auto import components
  ** See https://nuxtjs.org/api/configuration-components
  */
  components: [
    '@/components',
    '@/components/ui',
    '@/components/navigation',
    '@/components/modals',
    '@/components/userbox',
    '@/components/home',
  ],
  /*
  ** Nuxt.js dev-modules
  */
  buildModules: [
    // https://google-fonts.nuxtjs.org/
    '@nuxtjs/google-fonts',
    // https://tailwindcss.nuxtjs.org/
    '@nuxtjs/tailwindcss',
    // https://typescript.nuxtjs.org/
    '@nuxt/typescript-build',
    // https://composition-api.nuxtjs.org/
    '@nuxtjs/composition-api/module',
    // https://typed-vuex.roe.dev/
    'nuxt-typed-vuex',
    // https://github.com/fumeapp/nuxt-storm
    'nuxt-storm',
    // https://color-mode.nuxtjs.org
    '@nuxtjs/color-mode',
    [
      'unplugin-auto-import/nuxt',
      {
        dts: 'client/types/auto-imports.d.ts',
        imports: [
          '@vueuse/core',
          '@nuxtjs/composition-api',
        ],
        presetOverriding: true,
      },
    ],
  ],

  scriptSetup: {
    // ...
  },

  colorMode: {
    classSuffix: '',
  },

  /*
  ** Nuxt.js modules
  */
  modules: [
    // Doc: https://axios.nuxtjs.org/usage
    '@nuxtjs/axios',
    // Doc: https://auth.nuxtjs.org
    '@nuxtjs/auth-next',
    // Doc: https://github.com/acidjazz/nuxt-tailvue
    ['nuxt-tailvue', { all: true }],
  ],
  /*
  ** Axios module configuration
  ** See https://axios.nuxtjs.org/options
  */
  axios: {
    credentials: true,
    baseURL: process.env.API_URL,
    headers: {
      accept: 'application/json',
    },
  },
  /*
  ** Auth module configuration
  ** See https://auth.nuxtjs.org/
  */
  router: {
    // middleware: ['auth'],
  },
  auth: {

  },

  googleFonts: {
    families: {
      Poppins: true,
    },
  },
  /*
  ** Build configuration
  ** See https://nuxtjs.org/api/configuration-build/
  */
  build: {},

}
