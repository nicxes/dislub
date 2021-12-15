/*
** TailwindCSS Configuration File
**
** Docs: https://tailwindcss.com/docs/configuration
** Default: https://github.com/tailwindcss/tailwindcss/blob/master/stubs/defaultConfig.stub.js
*/
const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
  mode: 'jit',
  darkMode: 'class',
  variants: {
    extend: {
      typography: ['dark'],
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
  theme: {
    extend: {
      colors: {
        darked: '#14142B',
        background: '#F7F7FC',
        line: '#D9DBE9',
        primary: '#3B89A1',
        error: '#C30052',
        'input-background': '#EFF0F7',
        'input-placeholder-color': '#A0A3BD',
      },
      fontFamily: {
        body: ['Poppins'],
        display: ['Poppins'],
      },
    },
  },
  purge: {
    // Learn more on https://tailwindcss.com/docs/controlling-file-size/#removing-unused-css
    enabled: process.env.NODE_ENV === 'production',
    content: [
      'node_modules/tv-*/dist/tv-*.umd.min.js',
      'client/components/**/*.vue',
      'client/layouts/**/*.vue',
      'client/pages/**/*.vue',
      'client/plugins/**/*.js',
      'client/lib/**/*.ts',
      'client/lib/**/*.js',
      'client/lib/**/*.vue',
      'nuxt.config.js',
    ],
  },
}
