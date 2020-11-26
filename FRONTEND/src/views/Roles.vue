<template>
  <div class="grid grid-cols-1 gap-4">
    <form class="w-full max-w-lg justify-center">
      <div class="flex flex-wrap -mx-3 mb-2">
        <div class="w-full px-3 mb-6 md:mb-0">
          <label
            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="busqueda"
            >Buscar</label
          >
          <div class="relative">
            <select
              v-model="busqueda"
              class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
              id="busqueda"
            >
              <option>Seleccione una rol ...</option>
              <option v-for="r in roles" :key="r.id">{{ r.Rol }}</option>
            </select>
            <div
              class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700"
            >
              <svg
                class="fill-current h-4 w-4"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
              >
                <path
                  d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                />
              </svg>
            </div>
          </div>
        </div>
      </div>
      <div class="flex flex-wrap -mx-3 mb-2">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <label
            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="tipo_participante"
            >Tipo de Participante</label
          >
          <div class="relative">
            <select
              class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
              id="tipo_participante"
              v-model="tipoParticipante"
            >
              <option>Profesor</option>
              <option>Vigilante</option>
              <option>Externo</option>
              <option>Ayudante</option>
            </select>
            <div
              class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700"
            >
              <svg
                class="fill-current h-4 w-4"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
              >
                <path
                  d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                />
              </svg>
            </div>
          </div>
        </div>
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <label
            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="rol"
            >Rol</label
          >
          <input
            v-model="rol"
            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            id="rol"
            type="text"
            placeholder="Definir un rol"
          />
        </div>
      </div>
      <div class="flex justify-between content-center">
        <button
          @click="guardarRol"
          class="bg-gray-800 hover:bg-gray-900 text-white font-bold py-2 px-4 rounded"
          type="button"
        >
          Nuevo
        </button>
        <button
          @click="cargarBusqueda"
          class="bg-gray-800 hover:bg-gray-900 text-white font-bold py-2 px-4 rounded"
          type="button"
        >
          Modificar Rol
        </button>
        <button
          @click="modificarRol"
          class="bg-gray-800 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded"
          type="button"
        >
          Guardar Rol
        </button>
        <button
          @click="borrarRol"
          class="bg-gray-800 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
          type="button"
        >
          Eliminar Rol
        </button>
      </div>
    </form>
    <px-table-roles
      @delete-from-lista="borrarPorLista($event)"
      :roles="roles"
    />
  </div>
</template>

<script>
import api from "@/api";
import PxTableRoles from "@/components/PxTableRoles";

export default {
  name: "roles",

  components: {
    PxTableRoles
  },

  data() {
    return {
      busqueda: "",
      tipoParticipante: "",
      roles: [],
      rol: "",
      indexB: -1
    };
  },

  methods: {
    prueba(id) {
      console.log(id);
    },
    guardarRol() {
      let rol = {
        Tipo_Participante: this.tipoParticipante,
        Rol: this.rol
      };
      api.postRol(rol).then(result => {
        this.roles.push(result.data);
        console.log(this.roles);
      });
    },
    cargarBusqueda() {
      this.indexB = this.roles.findIndex(r => r.Rol === this.busqueda);
      this.tipoParticipante = this.roles[this.indexB].Tipo_Participante;
      this.rol = this.roles[this.indexB].Rol;
      console.log(this.roles[this.indexB]);
    },
    modificarRol() {
      var mensaje = confirm(
        `Esta seguro que quiere modificar el rol con ID: ${
          this.roles[this.indexB].id
        }?`
      );
      if (mensaje) {
        let rol = {
          Tipo_Participante: this.tipoParticipante,
          Rol: this.rol
        };
        api.putRol(rol, this.roles[this.indexB].id).then(result => {
          this.roles[this.indexB].Tipo_Participante =
            result.data.Tipo_Participante;
          this.roles[this.indexB].Rol = result.data.Rol;
          console.log(this.roles[this.indexB]);
          this.indexB = -1;
          this.busqueda = "";
        });
      }
      //this.indexB = -1;
    },
    borrarRol() {
      var mensaje = confirm(
        `Esta seguro que quiere BORRAR el rol con ID: ${
          this.roles[this.indexB].id
        }?`
      );
      if (mensaje) {
        api.deleteRol(this.roles[this.indexB].id).then(result => {
          if (result.status === 200) {
            this.roles.splice([this.indexB], 1);
            this.indexB = -1;
            this.busqueda = "";
          }
        });
      }
      //his.indexB = -1;
    },
    borrarPorLista(id) {
      var mensaje = confirm(
        `Esta seguro que quiere BORRAR el rol con ID: ${id}?`
      );
      if (mensaje) {
        let indexL = this.roles.findIndex(r => r.id === id);
        api.deleteRol(id).then(result => {
          if (result.status === 200) {
            this.roles.splice([indexL], 1);
          }
        });
      }
    }
  },

  created() {
    api.getRoles().then(result => {
      this.roles = result.data;
      console.log(this.roles);
    });
  }
};
</script>
