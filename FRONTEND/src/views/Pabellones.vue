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
              <option>Seleccione un pabellón ...</option>
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
      </div>
      <div class="flex flex-wrap -mx-3 mb-2">
        <div class="w-full md:w-2/2 px-3 mb-6 md:mb-0">
          <label
            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="pabellon"
            >Nombre de Pabellón</label
          >
          <input
            v-model="pabellon"
            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            id="pabellon"
            type="text"
            placeholder="Definir un pabellon"
          />
        </div>
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <label
            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="guardero"
            >Guardero</label
          >
          <input
            v-model="guardero"
            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            id="guardero"
            type="text"
            placeholder="Nombre del Guardero"
          />
        </div>
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <label
            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="telefono"
            >Teléfono</label
          >
          <input
            v-model="telefono"
            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            id="telefono"
            type="text"
            placeholder="Telefono del guardero"
          />
        </div>
      </div>
      <div class="flex justify-between content-center">
        <button
          @click="guardarPabellon"
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
          @click="modificarPabellon"
          class="bg-gray-800 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded"
          type="button"
        >
          Guardar
        </button>
        <button
          @click="borrarPabellon"
          class="bg-gray-800 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
          type="button"
        >
          Eliminar
        </button>
      </div>
    </form>
    <px-table-pabellones
      @delete-from-lista="borrarPorLista($event)"
      :pabellones="pabellones"
    />
  </div>
</template>

<script>
import api from "@/api";
import PxTablePabellones from "@/components/PxTablePabellones";

export default {
  name: "pabellones",

  components: {
    PxTablePabellones
  },

  data() {
    return {
      busqueda: "",
      pabellones: [],
      indexB: -1,

      pabellon: "",
      guardero: "",
      telefono: 0
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
    guardarPabellon() {
      let pabellon = {
        Pabellon: this.pabellon,
        Guardero: this.guardero,
        Teléfono: this.telefono
      };
      api
        .postPabellon(pabellon)
        .then(result => {
          this.pabellones.push(result.data);
          console.log(this.pabellones);
        })
        .catch(error => {
          this.alertErrores(error.response.data.error);
        });
    },
    cargarBusqueda() {
      this.indexB = this.pabellones.findIndex(
        r => r.Pabellon === this.busqueda
      );
      this.pabellon = this.pabellones[this.indexB].Pabellon;
      this.guardero = this.pabellones[this.indexB].Guardero;
      this.telefono = this.pabellones[this.indexB].Teléfono;
      console.log(this.pabellones[this.indexB]);
    },
    modificarPabellon() {
      var mensaje = confirm(
        `Esta seguro que quiere modificar el pabellón con ID: ${
          this.pabellones[this.indexB].id
        }?`
      );
      if (mensaje) {
        let pabellon = {
          Pabellon: this.pabellon,
          Guardero: this.guardero,
          Teléfono: this.telefono
        };
        api
          .putPabellon(pabellon, this.pabellones[this.indexB].id)
          .then(result => {
            this.pabellones[this.indexB].Pabellon = result.data.Pabellon;
            this.pabellones[this.indexB].Guardero = result.data.Guardero;
            this.pabellones[this.indexB].Teléfono = result.data.Teléfono;
            console.log(this.pabellones[this.indexB]);
            this.indexB = -1;
            this.busqueda = "";
          })
          .catch(error => {
            this.alertErrores(error.response.data.error);
          });
      }
      //this.indexB = -1;
    },
    borrarPabellon() {
      var mensaje = confirm(
        `Esta seguro que quiere BORRAR el pabellón con ID: ${
          this.pabellones[this.indexB].id
        }?`
      );
      if (mensaje) {
        api
          .deletePabellon(this.pabellones[this.indexB].id)
          .then(result => {
            if (result.status === 200) {
              this.pabellones.splice([this.indexB], 1);
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
        `Esta seguro que quiere BORRAR el pabellón con ID: ${id}?`
      );
      if (mensaje) {
        let indexL = this.pabellones.findIndex(r => r.id === id);
        api
          .deletePabellon(id)
          .then(result => {
            if (result.status === 200) {
              this.pabellones.splice([indexL], 1);
            }
          })
          .catch(error => {
            this.alertErrores(error.response.data.error);
          });
      }
    }
  },

  created() {
    api.getPabellones().then(result => {
      this.pabellones = result.data;
      console.log(this.pabellones);
    });
  }
};
</script>
