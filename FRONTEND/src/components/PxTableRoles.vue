<template>
  <table>
    <thead>
      <tr class="bg-gray-100 border-b-2 border-gray-400">
        <th :class="{ up: this.sortOrder === 1, down: this.sortOrder === -1 }">
          <span class="underline cursor-pointer" @click="changeSortOrder"
            >Id</span
          >
        </th>
        <th>Tipo de participante</th>
        <th>Rol</th>

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
        v-for="a in filteredRoles"
        :key="a.id"
        class="border-b border-gray-200 hover:bg-gray-100 hover:bg-orange-100"
      >
        <td>
          <b>#{{ a.id }}</b>
        </td>
        <td>{{ a.Tipo_Participante }}</td>
        <td>{{ a.Rol }}</td>

        <td class="hidden sm:block">
          <button
            class="bg-red-700 hover:bg-red-800 text-white font-bold py-2 px-4 rounded"
            type="button"
            @click="deleteRol(a.id)"
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
  name: "PxTableRoles",

  data() {
    return {
      filter: "",
      sortOrder: 1
    };
  },

  computed: {
    filteredRoles() {
      const altOrder = this.sortOrder === 1 ? -1 : 1;

      return this.roles
        .filter(
          a =>
            a.Tipo_Participante.toLowerCase().includes(
              this.filter.toLowerCase()
            ) || a.Rol.toLowerCase().includes(this.filter.toLowerCase())
        )
        .sort((a, b) => {
          if (parseInt(a.id) > parseInt(b.id)) {
            return this.sortOrder;
          }

          return altOrder;
        });
    }
  },

  props: {
    roles: {
      type: Array,
      default: () => []
    }
  },
  methods: {
    changeSortOrder() {
      this.sortOrder = this.sortOrder === 1 ? -1 : 1;
    },
    deleteRol(id) {
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
