<template>
  <div class="grid grid-cols-1 gap-4">
    <form class="w-full max-w-lg justify-center">
      <div class="flex flex-wrap -mx-3 mb-2">
        <div class="w-full px-3 mb-6 md:mb-0">
          <label
            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="busqueda"
            >Buscar por Código</label
          >
          <div class="relative">
            <select
              v-model="busqueda"
              class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
              id="busqueda"
            >
              <option>Seleccione un aula ...</option>
              <option v-for="r in aulas" :key="r.id">{{ r.Código }}</option>
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
        <div class="w-full md:w-2/2 px-3 mb-6 md:mb-0">
          <label
            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="pabellon"
            >Pabellon</label
          >
          <div class="relative">
            <select
              class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
              id="pabellon"
              v-model="pabellon"
            >
              <option>Escoga un pabellon</option>
              <option v-for="r in pabellones" :key="r.id">
                {{ r.Pabellon }}
              </option>
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
            for="n_aula"
            >Aula N°</label
          >
          <input
            v-model="n_aula"
            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            id="n_aula"
            type="text"
            placeholder="Definir un rol"
          />
        </div>
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <label
            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="codigo"
            >Codigo</label
          >
          <input
            v-model="codigo"
            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            id="codigo"
            type="text"
            placeholder="Definir un rol"
          />
        </div>
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <label
            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="piso"
            >Piso</label
          >
          <input
            v-model="piso"
            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            id="piso"
            type="text"
            placeholder="Definir un rol"
          />
        </div>
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <label
            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="aforo"
            >Aforo</label
          >
          <input
            v-model="aforo"
            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            id="aforo"
            type="text"
            placeholder="Definir un rol"
          />
        </div>
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <label
            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="filas"
            >Filas</label
          >
          <input
            v-model="filas"
            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            id="filas"
            type="text"
            placeholder="Definir un rol"
          />
        </div>
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <label
            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="columnas"
            >Columnas</label
          >
          <input
            v-model="columnas"
            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            id="columnas"
            type="text"
            placeholder="Definir un rol"
          />
        </div>
      </div>
      <div class="flex flex-wrap -mx-3 mb-2">
        <div class="w-full px-3 mb-6 md:mb-0">
          <label
            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="situacion"
            >Situacion</label
          >
          <div class="relative">
            <select
              v-model="situacion"
              class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
              id="situacion"
            >
              <option>Seleccione una situacion ...</option>
              <option>Habilitado</option>
              <option>Deshabilitado</option>
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
      <div class="flex justify-between content-center">
        <button
          @click="guardarAula"
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
          Modificar
        </button>
        <button
          @click="modificarAula"
          class="bg-gray-800 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded"
          type="button"
        >
          Guardar
        </button>
        <button
          @click="borrarAula"
          class="bg-gray-800 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
          type="button"
        >
          Eliminar
        </button>
      </div>
    </form>
    <px-table-aulas
      @delete-from-lista="borrarPorLista($event)"
      :aulas="aulas"
    />
  </div>
</template>

<script>
import api from "@/api";
import PxTableAulas from "@/components/PxTableAulas";

export default {
  name: "aulas",

  components: {
    PxTableAulas
  },

  data() {
    return {
      busqueda: "",
      aulas: [],
      pabellones: [],
      indexB: -1,
      aux: {},

      pabellon: "",
      n_aula: "",
      codigo: "",
      piso: 0,
      aforo: 0,
      filas: 0,
      columnas: 0,
      situacion: ""
    };
  },

  methods: {
    prueba(id) {
      console.log(id);
    },
    guardarAula() {
      const pabellon = this.pabellones.find(r => r.Pabellon === this.pabellon);
      let aula = {
        Pabellon_id: pabellon.id,
        Aula_Nro: this.n_aula,
        Código: this.codigo,
        Piso: this.piso,
        Aforo: this.aforo,
        Filas: this.filas,
        Columnas: this.columnas,
        Situación: this.situacion
      };
      api.postAula(aula).then(result => {
        this.aulas.push(result.data);
        console.log(this.aulas);
      });
    },
    idPabellonToNombre(id) {
      api.getPabellon(id).then(result => {
        this.aux = result.data;
        return this.aux.Pabellon;
      });
    },
    cargarBusqueda() {
      this.indexB = this.aulas.findIndex(
        r => r.Código.toString() === this.busqueda
      );
      console.log(this.indexB);
      api.getPabellon(this.aulas[this.indexB].Pabellon_id).then(result => {
        this.aux = result.data;
        this.pabellon = this.aux.Pabellon;
        console.log(this.aux);
      });
      this.n_aula = this.aulas[this.indexB].Aula_Nro;
      this.codigo = this.aulas[this.indexB].Código;
      this.piso = this.aulas[this.indexB].Piso;
      this.aforo = this.aulas[this.indexB].Aforo;
      this.filas = this.aulas[this.indexB].Filas;
      this.columnas = this.aulas[this.indexB].Columnas;
      this.situacion = this.aulas[this.indexB].Situación;
    },
    modificarAula() {
      var mensaje = confirm(
        `Esta seguro que quiere modificar el aula con ID: ${
          this.aulas[this.indexB].id
        }?`
      );
      if (mensaje) {
        const pabellon = this.pabellones.find(
          r => r.Pabellon === this.pabellon
        );
        let aula = {
          Pabellon_id: pabellon.id,
          Aula_Nro: this.n_aula,
          Código: this.codigo,
          Piso: this.piso,
          Aforo: this.aforo,
          Filas: this.filas,
          Columnas: this.columnas,
          Situación: this.situacion
        };
        api.putAula(aula, this.aulas[this.indexB].id).then(result => {
          this.aulas[this.indexB].Pabellon_id = result.data.Pabellon_id;
          this.aulas[this.indexB].Aula_Nro = result.data.Aula_Nro;
          this.aulas[this.indexB].Código = result.data.Código;
          this.aulas[this.indexB].Piso = result.data.Piso;
          this.aulas[this.indexB].Aforo = result.data.Aforo;
          this.aulas[this.indexB].Filas = result.data.Filas;
          this.aulas[this.indexB].Columnas = result.data.Columnas;
          this.aulas[this.indexB].Situación = result.data.Situación;
          console.log(this.aulas[this.indexB]);
          this.indexB = -1;
          this.busqueda = "";
        });
      }
      //this.indexB = -1;
    },
    borrarAula() {
      var mensaje = confirm(
        `Esta seguro que quiere BORRAR el aula con ID: ${
          this.aulas[this.indexB].id
        }?`
      );
      if (mensaje) {
        api.deleteAula(this.aulas[this.indexB].id).then(result => {
          if (result.status === 200) {
            this.aulas.splice([this.indexB], 1);
            this.indexB = -1;
            this.busqueda = "";
          }
        });
      }
      //his.indexB = -1;
    },
    borrarPorLista(id) {
      var mensaje = confirm(
        `Esta seguro que quiere BORRAR el aula con ID: ${id}?`
      );
      if (mensaje) {
        let indexL = this.aulas.findIndex(r => r.id === id);
        api.deleteAula(id).then(result => {
          if (result.status === 200) {
            this.aulas.splice([indexL], 1);
          }
        });
      }
    }
  },

  created() {
    api.getAulas().then(result => {
      this.aulas = result.data;
      console.log(this.aulas);
    });
    api.getPabellones().then(result => {
      this.pabellones = result.data;
      console.log(this.pabellones);
    });
  }
};
</script>
