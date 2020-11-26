<template>
  <table>
    <thead>
      <tr class="bg-gray-100 border-b-2 border-gray-400">
        <th :class="{ up: this.sortOrder === 1, down: this.sortOrder === -1 }">
          <span class="underline cursor-pointer" @click="changeSortOrder"
            >Id</span
          >
        </th>
        <th>Participante</th>
        <th>Proceso</th>
        <th>Asistio</th>
        <th>Aula</th>
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
        v-for="a in filteredPProceso"
        :key="a.id"
        class="border-b border-gray-200 hover:bg-gray-100 hover:bg-orange-100"
      >
        <td>{{ a.id }}</td>
        <td>{{ a.Participante_id }}</td>
        <td>{{ a.Proceso_id }}</td>
        <td>{{ a.Asistencia }}</td>
        <td>{{ a.Aula_id }}</td>
        <td class="hidden sm:block">
          <button
            class="bg-red-700 hover:bg-red-800 text-white font-bold py-2 px-4 rounded"
            type="button"
            @click="deletePProceso(a.id)"
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
      sortOrder: 1,
    };
  },

  computed: {
    filteredPProceso() {
      const altOrder = this.sortOrder === 1 ? -1 : 1;

      return this.pParticipantes
        .filter(
          (a) =>
            a.Asistencia.toLowerCase().includes(this.filter.toLowerCase()) ||
            a.Aula_id.toString()
              .toLowerCase()
              .includes(this.filter.toLowerCase())
        )
        .sort((a, b) => {
          if (a.id > b.id) {
            return this.sortOrder;
          }

          return altOrder;
        });
    },
  },

  props: {
    pParticipantes: {
      type: Array,
      default: () => [],
    },
  },
  methods: {
    changeSortOrder() {
      this.sortOrder = this.sortOrder === 1 ? -1 : 1;
    },
    deletePProceso(id) {
      this.$emit("delete-from-lista", id);
    },
  },
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
