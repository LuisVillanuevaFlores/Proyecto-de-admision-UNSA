<template>
  <div>
    <header class="shadow w-screen">
      <nav>
        <nav class="flex items-center justify-between flex-wrap p-3">
          <div class="flex items-center flex-shrink-0 text-white mr-6">
            <img class="w-48" alt="UNSA logo" src="@/assets/logo.png" />
            <router-link
              :to="{ name: 'home' }"
              class="font-semibold text-4xl tracking-tight ml-10"
              >Gestion de Procesos de Admisión</router-link
            >
          </div>
        </nav>
      </nav>
    </header>
    <header
      class="bg-gray-900 sm:flex sm:justify-between sm:items-center sm:px-4 sm:py-3"
    >
      <div class="flex items-center justify-between px-4 py-3 sm:p-0">
        <div class="sm:hidden">
          <button
            @click="isOpen = !isOpen"
            type="button"
            class="block text-gray-500 hover:text-white focus:text-white focus:outline-none"
          >
            <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
              <path
                v-if="isOpen"
                fill-rule="evenodd"
                d="M18.278 16.864a1 1 0 0 1-1.414 1.414l-4.829-4.828-4.828 4.828a1 1 0 0 1-1.414-1.414l4.828-4.829-4.828-4.828a1 1 0 0 1 1.414-1.414l4.829 4.828 4.828-4.828a1 1 0 1 1 1.414 1.414l-4.828 4.829 4.828 4.828z"
              />
              <path
                v-if="!isOpen"
                fill-rule="evenodd"
                d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"
              />
            </svg>
          </button>
        </div>
      </div>
      <nav
        :class="isOpen ? 'block' : 'hidden'"
        class="px-2 pt-2 pb-4 sm:flex sm:p-0"
      >
        <router-link
          class="mt-1 block px-2 py-1 text-white font-semibold rounded hover:bg-gray-800 sm:mt-0 sm:ml-2"
          :to="{ name: 'roles' }"
          >Roles</router-link
        >
        <router-link
          class="mt-1 block px-2 py-1 text-white font-semibold rounded hover:bg-gray-800 sm:mt-0 sm:ml-2"
          :to="{ name: 'pabellones' }"
          >Pabellones</router-link
        >
        <router-link
          class="mt-1 block px-2 py-1 text-white font-semibold rounded hover:bg-gray-800 sm:mt-0 sm:ml-2"
          :to="{ name: 'aulas' }"
          >Aulas</router-link
        >
        <router-link
          class="mt-1 block px-2 py-1 text-white font-semibold rounded hover:bg-gray-800 sm:mt-0 sm:ml-2"
          :to="{ name: 'procesos' }"
          >Procesos</router-link
        >
        <router-link
          class="mt-1 block px-2 py-1 text-white font-semibold rounded hover:bg-gray-800 sm:mt-0 sm:ml-2"
          :to="{ name: 'participantes' }"
          >Participantes</router-link
        >
        <router-link
          class="mt-1 block px-2 py-1 text-white font-semibold rounded hover:bg-gray-800 sm:mt-0 sm:ml-2"
          :to="{ name: 'procesos-participantes' }"
          >Registrar Participantes en un proceso</router-link
        >
      </nav>
    </header>
  </div>
</template>

<script>
export default {
  data() {
    return {
      isOpen: false
    };
  }
};
</script>

<style scoped>
header {
  background-color: #64001d;
}
</style>
