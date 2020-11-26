<template>
  <table>
    <thead>
      <tr class="bg-gray-100 border-b-2 border-gray-400">
        <th :class="{ up: this.sortOrder === 1, down: this.sortOrder === -1 }">
          <span class="underline cursor-pointer" @click="changeSortOrder"
            >Pabellon</span
          >
        </th>
        <th>Guardero</th>
        <th>Telefono</th>
        <td class="hidden sm:block">
          <input
            class="bg-gray-100 focus:outline-none border-b border-gray-400 py-2 px-4 block w-full appearance-none leading-normal"
            id="filter"
            placeholder="Buscar ..."
            type="text"
            v-model="filter"
          />
        </td>
      </tr>
    </thead>
    <tbody>
      <tr
        v-for="a in filteredPabellones"
        :key="a.id"
        class="border-b border-gray-200 hover:bg-gray-100 hover:bg-orange-100"
      >
        <td>{{ a.Pabellon }}</td>
        <td>{{ a.Guardero }}</td>
        <td>{{ a.Teléfono }}</td>
        <td class="hidden sm:block">
          <button
            class="bg-red-700 hover:bg-red-800 text-white font-bold py-2 px-4 rounded"
            type="button"
            @click="deletePabellon(a.id)"
          >
            Eliminar
          </button>
        </td>
      </tr>
    </tbody>
  </table>
</template>

<script>
export default {
  name: "PxTablePabellones",

  data() {
    return {
      filter: "",
      sortOrder: 1
    };
  },

  computed: {
    filteredPabellones() {
      const altOrder = this.sortOrder === 1 ? -1 : 1;

      return this.pabellones
        .filter(
          a =>
            a.Pabellon.toLowerCase().includes(this.filter.toLowerCase()) ||
            a.Guardero.toLowerCase().includes(this.filter.toLowerCase())
        )
        .sort((a, b) => {
          if (a.Pabellon.toLowerCase() > b.Pabellon.toLowerCase()) {
            return this.sortOrder;
          }

          return altOrder;
        });
    }
  },

  props: {
    pabellones: {
      type: Array,
      default: () => []
    }
  },
  methods: {
    changeSortOrder() {
      this.sortOrder = this.sortOrder === 1 ? -1 : 1;
    },
    deletePabellon(id) {
      this.$emit("delete-from-lista", id);
    }
  }
};
</script>

<style scoped>
.up::before {
  content: "👆";
}

.down::before {
  content: "👇";
}

td {
  padding: 20px 0px;
  font-size: 0.6rem;
  text-align: center;
}

th {
  padding: 5px;
  font-size: 0.6rem;
}

@media (min-width: 640px) {
  td,
  th {
    padding: 20px;
    font-size: 1rem;
  }

  th {
    padding: 12px;
  }
}
</style>
