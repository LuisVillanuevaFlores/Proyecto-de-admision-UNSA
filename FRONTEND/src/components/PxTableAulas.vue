<template>
  <table>
    <thead>
      <tr class="bg-gray-100 border-b-2 border-gray-400">
        <th :class="{ up: this.sortOrder === 1, down: this.sortOrder === -1 }">
          <span class="underline cursor-pointer" @click="changeSortOrder"
            >Pabellon</span
          >
        </th>
        <th>Aula N°</th>
        <th>Codigo</th>
        <th>Piso</th>
        <th>Aforo</th>
        <th>Filas</th>
        <th>Columnas</th>
        <th>Situación</th>
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
        v-for="a in filteredAulas"
        :key="a.id"
        class="border-b border-gray-200 hover:bg-gray-100 hover:bg-orange-100"
      >
        <td>{{ a.Pabellon_id }}</td>
        <td>{{ a.Aula_Nro }}</td>
        <td>{{ a.Código }}</td>
        <td>{{ a.Piso }}</td>
        <td>{{ a.Aforo }}</td>
        <td>{{ a.Filas }}</td>
        <td>{{ a.Columnas }}</td>
        <td>{{ a.Situación }}</td>
        <td class="hidden sm:block">
          <button
            class="bg-red-700 hover:bg-red-800 text-white font-bold py-2 px-4 rounded"
            type="button"
            @click="deleteAula(a.id)"
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
  name: "PxTableAulas",

  data() {
    return {
      filter: "",
      sortOrder: 1
    };
  },

  computed: {
    filteredAulas() {
      const altOrder = this.sortOrder === 1 ? -1 : 1;

      return this.aulas
        .filter(
          a =>
            a.Aula_Nro.toString().includes(this.filter.toLowerCase()) ||
            a.Situación.includes(this.filter) ||
            a.Código.toString().includes(this.filter.toLowerCase())
        )
        .sort((a, b) => {
          if (a.Pabellon_id > b.Pabellon_id) {
            return this.sortOrder;
          }

          return altOrder;
        });
    }
  },

  props: {
    aulas: {
      type: Array,
      default: () => []
    }
  },
  methods: {
    changeSortOrder() {
      this.sortOrder = this.sortOrder === 1 ? -1 : 1;
    },
    deleteAula(id) {
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
