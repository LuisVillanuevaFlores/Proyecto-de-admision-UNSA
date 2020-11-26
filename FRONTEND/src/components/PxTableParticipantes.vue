<template>
  <table>
    <thead>
      <tr class="bg-gray-100 border-b-2 border-gray-400">
        <th :class="{ up: this.sortOrder === 1, down: this.sortOrder === -1 }">
          <span class="underline cursor-pointer" @click="changeSortOrder"
            >Apellidos</span
          >
        </th>
        <th>Nombres</th>
        <th>Documento de Identidad</th>
        <th>Tipo de participante</th>
        <th>Correo</th>
        <th>Telefono</th>
        <th>Situacion</th>
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
        v-for="a in filteredParticipantes"
        :key="a.id"
        class="border-b border-gray-200 hover:bg-gray-100 hover:bg-orange-100"
      >
        <td>{{ a.Apellidos }}</td>
        <td>{{ a.Nombres }}</td>
        <td>{{ a.Nro_Documento }}</td>
        <td>{{ a.Tipo_Participante }}</td>
        <td>{{ a.Correo }}</td>
        <td>{{ a.Teléfono }}</td>
        <td>{{ a.Situación }}</td>
        <td class="hidden sm:block">
          <button
            class="bg-red-700 hover:bg-red-800 text-white font-bold py-2 px-4 rounded"
            type="button"
            @click="deleteParticipante(a.id)"
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
  name: "PxTableParticipantes",

  data() {
    return {
      filter: "",
      sortOrder: 1
    };
  },

  computed: {
    filteredParticipantes() {
      const altOrder = this.sortOrder === 1 ? -1 : 1;

      return this.participantes
        .filter(
          a =>
            a.Tipo_Participante.toLowerCase().includes(
              this.filter.toLowerCase()
            ) ||
            a.Nro_Documento.toString().includes(this.filter.toLowerCase()) ||
            a.Apellidos.toLowerCase().includes(this.filter.toLowerCase()) ||
            a.Nombres.toLowerCase().includes(this.filter.toLowerCase()) ||
            a.Situación.toLowerCase().includes(this.filter.toLowerCase())
        )
        .sort((a, b) => {
          if (a.Apellidos.toLowerCase() > b.Apellidos.toLowerCase()) {
            return this.sortOrder;
          }

          return altOrder;
        });
    }
  },

  props: {
    participantes: {
      type: Array,
      default: () => []
    }
  },
  methods: {
    changeSortOrder() {
      this.sortOrder = this.sortOrder === 1 ? -1 : 1;
    },
    deleteParticipante(id) {
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
