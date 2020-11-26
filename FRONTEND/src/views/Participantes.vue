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
              <option>Seleccione un participante ...</option>
              <option v-for="r in participantes" :key="r.id">
                {{ `${r.Apellidos} ${r.Nombres}` }}
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
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <label
            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="tipo_documento"
            >Tipo de Documento</label
          >
          <div class="relative">
            <select
              class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
              id="tipo_documento"
              v-model="Tipo_Documento"
            >
              <option>DNI</option>
              <option>Pasaporte</option>
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
            for="n_documento"
            >Numero de Documento</label
          >
          <input
            v-model="Nro_Documento"
            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            id="n_documento"
            type="text"
            placeholder="Numero de Documento"
          />
        </div>
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <label
            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="apellidos"
            >Apellidos</label
          >
          <input
            v-model="Apellidos"
            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            id="apellidos"
            type="text"
            placeholder="Apellidos..."
          />
        </div>
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <label
            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="nombres"
            >Nombres</label
          >
          <input
            v-model="Nombres"
            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            id="nombres"
            type="text"
            placeholder="Nombre..."
          />
        </div>
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <label
            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="nacimiento"
            >Fecha de Nacimiento</label
          >
          <input
            v-model="Fecha_Nacimiento"
            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            id="nacimiento"
            type="date"
          />
        </div>
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <label
            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="sexo"
            >Sexo</label
          >
          <div class="relative">
            <select
              class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
              id="sexo"
              v-model="Sexo"
            >
              <option>Masculino</option>
              <option>Femenino</option>
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
            for="correo"
            >Correo</label
          >
          <input
            v-model="Correo"
            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            id="correo"
            type="email"
            placeholder="Correo..."
          />
        </div>
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <label
            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="telefono"
            >Teléfono</label
          >
          <input
            v-model="Teléfono"
            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            id="telefono"
            type="phone"
            placeholder="Numero de celular..."
          />
        </div>
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <label
            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="situacion"
            >Situación</label
          >
          <div class="relative">
            <select
              class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
              id="situacion"
              v-model="Situación"
            >
              <option>Retirado</option>
              <option>Activo</option>
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
            for="t_participante"
            >Tipo de Participante</label
          >
          <div class="relative">
            <select
              class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
              id="t_participante"
              v-model="Tipo_Participante"
            >
              <option>Profesor</option>
              <option>Administrativo</option>
              <option>Alumno</option>
              <option>Otro</option>
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
        <div
          v-show="Tipo_Participante === 'Alumno'"
          class="w-full md:w-1/2 px-3 mb-6 md:mb-0"
        >
          <label
            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="cui"
            >CUI</label
          >
          <input
            v-model="CUI"
            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            id="cui"
            type="number"
            placeholder="Numero de cui..."
          />
        </div>
      </div>
      <div class="flex justify-between content-center">
        <button
          @click="guardarParticipante"
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
          @click="modificarParticipante"
          class="bg-gray-800 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded"
          type="button"
        >
          Guardar
        </button>
        <button
          @click="borrarParticipante"
          class="bg-gray-800 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
          type="button"
        >
          Eliminar
        </button>
      </div>
    </form>
    <px-table-participantes
      @delete-from-lista="borrarPorLista($event)"
      :participantes="participantes"
    />
  </div>
</template>

<script>
import api from "@/api";
import PxTableParticipantes from "@/components/PxTableParticipantes";

export default {
  name: "participantes",

  components: {
    PxTableParticipantes
  },

  data() {
    return {
      busqueda: "",
      participantes: [],
      indexB: -1,

      Tipo_Participante: "",
      Tipo_Documento: "",
      Nro_Documento: 0,
      Apellidos: "",
      Nombres: "",
      Fecha_Nacimiento: "",
      Sexo: "",
      Correo: "",
      Teléfono: "",
      Situación: "",
      CUI: 0
    };
  },

  methods: {
    prueba() {
      console.log(this.Fecha_Nacimiento);
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
    guardarParticipante() {
      let participante = {
        Tipo_Participante: this.Tipo_Participante,
        Tipo_Documento: this.Tipo_Documento,
        Nro_Documento: this.Nro_Documento,
        Apellidos: this.Apellidos,
        Nombres: this.Nombres,
        Fecha_Nacimiento: this.Fecha_Nacimiento,
        Sexo: this.Sexo,
        Correo: this.Correo,
        Teléfono: this.Teléfono,
        Situación: this.Situación,
        CUI: this.CUI
      };
      api
        .postParticipante(participante)
        .then(result => {
          this.participantes.push(result.data);
          console.log(this.participantes);
        })
        .catch(error => {
          this.alertErrores(error.response.data.error);
        });
    },
    cargarBusqueda() {
      this.indexB = this.participantes.findIndex(
        r => `${r.Apellidos} ${r.Nombres}` === this.busqueda
      );
      this.Tipo_Participante = this.participantes[
        this.indexB
      ].Tipo_Participante;
      this.Tipo_Documento = this.participantes[this.indexB].Tipo_Documento;
      this.Nro_Documento = this.participantes[this.indexB].Nro_Documento;
      this.Apellidos = this.participantes[this.indexB].Apellidos;
      this.Nombres = this.participantes[this.indexB].Nombres;
      this.Fecha_Nacimiento = this.participantes[this.indexB].Fecha_Nacimiento;
      this.Sexo = this.participantes[this.indexB].Sexo;
      this.Correo = this.participantes[this.indexB].Correo;
      this.Teléfono = this.participantes[this.indexB].Teléfono;
      this.Situación = this.participantes[this.indexB].Situación;
      this.CUI = this.participantes[this.indexB].CUI;
      console.log(this.participantes[this.indexB]);
    },
    modificarParticipante() {
      var mensaje = confirm(
        `Esta seguro que quiere modificar al participante con ID: ${
          this.participantes[this.indexB].id
        }?`
      );
      if (mensaje) {
        let participante = {
          Tipo_Participante: this.Tipo_Participante,
          Tipo_Documento: this.Tipo_Documento,
          Nro_Documento: this.Nro_Documento,
          Apellidos: this.Apellidos,
          Nombres: this.Nombres,
          Fecha_Nacimiento: this.Fecha_Nacimiento,
          Sexo: this.Sexo,
          Correo: this.Correo,
          Teléfono: this.Teléfono,
          Situación: this.Situación,
          CUI: this.CUI
        };
        api
          .putParticipante(participante, this.participantes[this.indexB].id)
          .then(result => {
            this.participantes[this.indexB].Tipo_Participante =
              result.data.Tipo_Participante;
            this.participantes[this.indexB].Tipo_Documento =
              result.data.Tipo_Documento;
            this.participantes[this.indexB].Nro_Documento =
              result.data.Nro_Documento;
            this.participantes[this.indexB].Apellidos = result.data.Apellidos;
            this.participantes[this.indexB].Nombres = result.data.Nombres;
            this.participantes[this.indexB].Fecha_Nacimiento =
              result.data.Fecha_Nacimiento;
            this.participantes[this.indexB].Sexo = result.data.Sexo;
            this.participantes[this.indexB].Correo = result.data.Correo;
            this.participantes[this.indexB].Teléfono = result.data.Teléfono;
            this.participantes[this.indexB].Situación = result.data.Situación;
            this.participantes[this.indexB].CUI = result.data.CUI;
            console.log(this.participantes[this.indexB]);
            this.indexB = -1;
            this.busqueda = "";
          })
          .catch(error => {
            this.alertErrores(error.response.data.error);
          });
      }
      //this.indexB = -1;
    },
    borrarParticipante() {
      var mensaje = confirm(
        `Esta seguro que quiere BORRAR al participante con ID: ${
          this.participantes[this.indexB].id
        }?`
      );
      if (mensaje) {
        api
          .deleteParticipante(this.participantes[this.indexB].id)
          .then(result => {
            if (result.status === 200) {
              this.participantes.splice([this.indexB], 1);
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
        `Esta seguro que quiere BORRAR al participante con ID: ${id}?`
      );
      if (mensaje) {
        let indexL = this.participantes.findIndex(r => r.id === id);
        api
          .deleteParticipante(id)
          .then(result => {
            if (result.status === 200) {
              this.participantes.splice([indexL], 1);
            }
          })
          .catch(error => {
            this.alertErrores(error.response.data.error);
          });
      }
    }
  },

  created() {
    api.getParticipantes().then(result => {
      this.participantes = result.data;
      console.log(this.participantes);
    });
  }
};
</script>
