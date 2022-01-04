<template>
  <NuxtLink :to="to" class="Link flex justify-center items-center flex-col rounded-2xl py-1 text-[#A0A3BD] font-medium text-sm leading-[22px]">
    <div>
      <span v-if="icon === 'home'">
        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M4 13.0997C4 12.1512 4.44853 11.2586 5.20956 10.6926L16 2.66663L26.7904 10.6926C27.5515 11.2586 28 12.1512 28 13.0997V26.8333C28 28.214 26.8807 29.3333 25.5 29.3333H20.6C20.0477 29.3333 19.6 28.8856 19.6 28.3333V20.7424C19.6 20.4662 19.3761 20.2424 19.1 20.2424H12.9C12.6239 20.2424 12.4 20.4662 12.4 20.7424V28.3333C12.4 28.8856 11.9523 29.3333 11.4 29.3333H6.5C5.11929 29.3333 4 28.214 4 26.8333V13.0997Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </span>

      <span v-else-if="icon === 'bag'">
        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M4.45725 6.96094C4.16167 7.31923 4 7.76923 4 8.23371V26.3334C4 27.9902 5.34315 29.3334 7 29.3334H25C26.6569 29.3334 28 27.9902 28 26.3334V8.23371C28 7.76923 27.8383 7.31923 27.5427 6.96094L24.6 3.39394C24.22 2.93342 23.6542 2.66671 23.0572 2.66671H8.94278C8.34576 2.66671 7.77996 2.93342 7.40003 3.39394L4.45725 6.96094Z"  stroke-width="2"/>
          <path d="M4 8H28" stroke-width="2"/>
          <path d="M21.3334 13.3334C21.3334 16.2789 18.9455 18.6667 16 18.6667C13.0545 18.6667 10.6667 16.2789 10.6667 13.3334" stroke-width="2" stroke-linecap="round"/>
        </svg>
      </span>

      <span v-else-if="icon === 'attach'">
        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M26.4667 14.76L15.6399 25.5867C15.6399 25.5867 10.6132 30.6134 5.97322 25.9734C1.33319 21.3334 6.35989 16.3067 6.35989 16.3067L17.5733 5.09327C17.5733 5.09327 20.6666 1.99992 23.76 5.09327C26.8534 8.18662 23.76 11.28 23.76 11.28L12.9333 22.1067C12.9333 22.1067 11.3866 23.6534 9.83991 22.1067C8.29323 20.56 9.83991 19.0134 9.83991 19.0134L19.8933 8.95996"  stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </span>

      <span v-else-if="icon === 'users'">
        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M4 28.6667L4.33214 26.5315C4.54072 25.1906 5.41518 24.0452 6.70281 23.6169C8.79618 22.9206 12.2692 22 16 22C19.7308 22 23.2038 22.9206 25.2972 23.6169C26.5848 24.0452 27.4593 25.1906 27.6679 26.5315L28 28.6667" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M16 16C19.6819 16 22.6666 13.0152 22.6666 9.33329C22.6666 5.65139 19.6819 2.66663 16 2.66663C12.3181 2.66663 9.33331 5.65139 9.33331 9.33329C9.33331 13.0152 12.3181 16 16 16Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </span>

      <span v-else-if="icon === 'categories'">
        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M4 22.6666H17.3333" stroke-width="2" stroke-linecap="round"/>
          <path d="M13.3333 9.33337H26.6666" stroke-width="2" stroke-linecap="round"/>
          <circle cx="22.6666" cy="22.6667" r="4.33333" stroke-width="2"/>
          <path d="M12.3334 9.33333C12.3334 11.7266 10.3933 13.6667 8.00002 13.6667C5.60679 13.6667 3.66669 11.7266 3.66669 9.33333C3.66669 6.9401 5.60679 5 8.00002 5C10.3933 5 12.3334 6.9401 12.3334 9.33333Z" stroke-width="2"/>
        </svg>
      </span>
    </div>

    {{ text }}
  </NuxtLink>
</template>

<script>
export default {
  props: {
    text: {
      type: String,
      required: true,
    },
    to: {
      type: String,
      required: true,
    },
    icon: {
      type: String,
      required: true,
    },
  },
}
</script>

<style scoped>
  .nuxt-link-active {
    color: #3B89A1;
    background: #EFF0F6;
  }

  .Link svg {
    stroke: #A0A3BD;
    transition: ease-out;
    transition-duration: 300ms;
  }
  .Link:hover svg {
    stroke: #3B89A1;
  }
  .nuxt-link-active svg {
    stroke: #3B89A1;
  }
</style>
