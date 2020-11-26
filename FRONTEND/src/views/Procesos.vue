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
              <option>Seleccione un proceso ...</option>
              <option v-for="r in procesos" :key="r.id">
                {{ r.Proceso }}
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
      </div>
      <div class="flex flex-wrap -mx-3 mb-2">
        <div class="w-full md:w-2/2 px-3 mb-6 md:mb-0">
          <label
            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="nombre"
            >Nombre de Proceso</label
          >
          <input
            v-model="nombre"
            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            id="nombre"
            type="text"
            placeholder="Definir un proceso"
          />
        </div>
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <label
            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="fecha"
            >Fecha</label
          >
          <input
            v-model="fecha"
            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            id="fecha"
            type="date"
            placeholder="Fecha del proceso"
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
              <option>Ejecucion</option>
              <option>Finalizado</option>
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
          @click="guardarProceso"
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
          @click="modificarProceso"
          class="bg-gray-800 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded"
          type="button"
        >
          Guardar
        </button>
        <button
          @click="borrarProceso"
          class="bg-gray-800 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
          type="button"
        >
          Eliminar
        </button>
      </div>
    </form>
    <px-table-procesos
      @delete-from-lista="borrarPorLista($event)"
      :procesos="procesos"
    />
  </div>
</template>

<script>
import api from "@/api";
import PxTableProcesos from "@/components/PxTableProcesos";

export default {
  name: "procesos",

  components: {
    PxTableProcesos
  },

  data() {
    return {
      busqueda: "",
      procesos: [],
      indexB: -1,

      nombre: "",
      fecha: "",
      situacion: 0
    };
  },

  methods: {
    prueba(id) {
      console.log(id);
    },
    alertErrores(error) {
      let msjAlert = "Solucione los siguientes errores\n";
      console.log(error);
      for (const prop in error) {
        error[prop].forEach(element => {
          msjAlert = msjAlert + `- ${element}\n`;
        });
      }
      alert(msjAlert);
    },
    guardarProceso() {
      let proceso = {
        Proceso: this.nombre,
        Fecha: this.fecha,
        Situacion: this.situacion
      };
      api
        .postProceso(proceso)
        .then(result => {
          this.procesos.push(result.data);
          console.log(this.procesos);
        })
        .catch(error => {
          this.alertErrores(error.response.data.error);
        });
    },
    cargarBusqueda() {
      this.indexB = this.procesos.findIndex(r => r.Proceso === this.busqueda);
      this.nombre = this.procesos[this.indexB].Proceso;
      this.fecha = this.procesos[this.indexB].Fecha;
      this.situacion = this.procesos[this.indexB].Situacion;
      console.log(this.procesos[this.indexB]);
    },
    modificarProceso() {
      var mensaje = confirm(
        `Esta seguro que quiere modificar el proceso con ID: ${
          this.procesos[this.indexB].id
        }?`
      );
      if (mensaje) {
        let proceso = {
          Proceso: this.nombre,
          Fecha: this.fecha,
          Situacion: this.situacion
        };
        api
          .putProceso(proceso, this.procesos[this.indexB].id)
          .then(result => {
            this.procesos[this.indexB].Proceso = result.data.Proceso;
            this.procesos[this.indexB].Fecha = result.data.Fecha;
            this.procesos[this.indexB].Situacion = result.data.Situacion;
            console.log(this.procesos[this.indexB]);
            this.indexB = -1;
            this.busqueda = "";
          })
          .catch(error => {
            this.alertErrores(error.response.data.error);
          });
      }
      //this.indexB = -1;
    },
    borrarProceso() {
      var mensaje = confirm(
        `Esta seguro que quiere BORRAR el proceso con ID: ${
          this.procesos[this.indexB].id
        }?`
      );
      if (mensaje) {
        api
          .deleteProceso(this.procesos[this.indexB].id)
          .then(result => {
            if (result.status === 200) {
              this.procesos.splice([this.indexB], 1);
              this.indexB = -1;
              this.busqueda = "";
            }
          })
          .catch(error => {
            this.alertErrores(error.response.data.error);
          });
      }
      //his.indexB = -1;
    },
    borrarPorLista(id) {
      var mensaje = confirm(
        `Esta seguro que quiere BORRAR el proceso con ID: ${id}?`
      );
      if (mensaje) {
        let indexL = this.procesos.findIndex(r => r.id === id);
        api
          .deleteProceso(id)
          .then(result => {
            if (result.status === 200) {
              this.procesos.splice([indexL], 1);
            }
          })
          .catch(error => {
            this.alertErrores(error.response.data.error);
          });
      }
    }
  },

  created() {
    api.getProcesos().then(result => {
      this.procesos = result.data;
      console.log(this.procesos);
    });
  }
};
</script>
