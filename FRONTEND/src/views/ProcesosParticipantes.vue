<template>
  <div class="grid grid-cols-1 gap-4">
    <form class="w-full max-w-lg justify-center">
      <div id="pru" class="flex flex-wrap -mx-3 mb-2">
        <div class="w-full px-3 mb-6 md:mb-0">
          <label
            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="busqueda"
            >Buscar por ID</label
          >
          <div class="relative">
            <select
              v-model="busqueda"
              class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
              id="busqueda"
            >
              <option>Seleccione una asignación ...</option>
              <option v-for="r in pParticipantes" :key="r.id">{{
                r.id
              }}</option>
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
            for="proceso"
            >Proceso</label
          >
          <div class="relative">
            <select
              class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
              id="proceso"
              v-model="Proceso_name"
            >
              <option>Escoga un proceso</option>
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
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <label
            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="participante"
            >Participante</label
          >
          <div class="relative">
            <select
              class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
              id="participante"
              v-model="Participante_name"
            >
              <option>Escoga un participante</option>
              <option v-for="r in participantes" :key="r.id">
                {{ r.Nro_Documento }}
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
            for="rol"
            >Rol</label
          >
          <div class="relative">
            <select
              class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
              id="rol"
              v-model="Rol_name"
            >
              <option>Escoga un rol</option>
              <option v-for="r in roles" :key="r.id">
                {{ r.Rol }}
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
            for="aula"
            >Aula asignada</label
          >
          <div class="relative">
            <select
              class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
              id="aula"
              v-model="Aula_name"
            >
              <option>Escoga un pabellon</option>
              <option v-for="r in aulas" :key="r.id">
                {{ r.Código }}
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
            for="dj"
            >¿Entrego Declaracion Jurada?</label
          >
          <div class="relative">
            <select
              class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
              id="dj"
              v-model="Entrega_DJ"
            >
              <option>Si o No</option>
              <option>Si</option>
              <option>No</option>
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
            for="asistencia"
            >¿Asistió al proceso?</label
          >
          <div class="relative">
            <select
              class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
              id="asistencia"
              v-model="Asistencia"
            >
              <option>Si o No</option>
              <option>Si</option>
              <option>No</option>
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
          @click="guardarPParticipante"
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
          @click="modificarPParticipantes"
          class="bg-gray-800 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded"
          type="button"
        >
          Guardar
        </button>
        <button
          @click="borrarPParticipante"
          class="bg-gray-800 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
          type="button"
        >
          Eliminar
        </button>
        <button
          @click="exportExcel"
          class="bg-gray-800 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
          type="button"
        >
          PDF
        </button>
      </div>
    </form>
    <div>
      <px-table-procesos-participantes
        @delete-from-lista="borrarPorLista($event)"
        :pParticipantes="pParticipantes"
      />
    </div>
  </div>
</template>
<script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>

<script>
import api from "@/api";
import XLSX from "xlsx";
// import jsPDF from "jspdf";
// import html2canvas from "html2canvas";
import PxTableProcesosParticipantes from "@/components/PxTableProcesosParticipantes";
export default {
  name: "aulas",

  components: {
    PxTableProcesosParticipantes,
  },

  data() {
    return {
      busqueda: "",
      pParticipantes: [],
      procesos: [],
      participantes: [],
      roles: [],
      aulas: [],
      Datos: [],
      indexB: -1,
      aux: {},

      Proceso_name: "",
      Participante_name: "",
      Rol_name: "",
      Aula_name: "",
      Entrega_DJ: "",
      Asistencia: "",
    };
  },
  mounted() {
    let a = document.createElement("script");
    a.setAttribute("src", "https://code.jquery.com/jquery-1.12.3.min.js");
    document.head.appendChild(a);
    let recaptchaScript = document.createElement("script");
    recaptchaScript.setAttribute(
      "src",
      "https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"
    );
    document.head.appendChild(recaptchaScript);
  },

  methods: {
    exportExcel() {
      var b = confirm("Usted decea generar Credencial");
      console.log(b);
      if (b) {
        var pdf = new jsPDF("p", "mm", "letter");

        var DATOS = [];

        for (let i = 1; i < 3; i++) {
          //DATOS.length
          //pdf.addPage();
          pdf.setDrawColor(0);
          pdf.setFillColor(255, 255, 255);
          //ADELANTE
          pdf.roundedRect(20, 20, 170, 120, 1, 1, "FD");
          pdf.setFillColor(138, 14, 35);
          pdf.roundedRect(20, 25, 170, 20, 0, 0, "FD");
          pdf.setFont("helvetica");
          pdf.setFontType("bold");
          pdf.setFontSize(24);
          pdf.text(
            105,
            40,
            this.Datos[0].key + " " + this.Datos[0].value,
            "center"
          );

          pdf.setFontSize(18);
          pdf.text(105, 60, this.Datos[i].value.name, "center");
          pdf.text(105, 70, this.Datos[i].value.apellido, "center");
          pdf.setFontSize(16);
          pdf.text(30, 90, "CARGO: " + this.Datos[i].value.cargo);
          pdf.text(30, 100, "UBICACIÓN: " + this.Datos[i].value.ubicacion);

          pdf.setFillColor(138, 14, 35);
          pdf.roundedRect(20, 110, 170, 30, 1, 1, "FD");

          pdf.roundedRect(20, 150, 170, 10, 1, 1, "FD");
          pdf.roundedRect(20, 240, 170, 10, 1, 1, "FD");

          pdf.setFont("helvetica");
          pdf.setFontType("bold");
          pdf.setFontSize(70);
          pdf.setTextColor(120);
          pdf.text(100, 135, "UNS", "center");
          pdf.setTextColor(255);
          pdf.text(135, 135, "A", "center");

          //ATRAS

          pdf.setFontSize(18);
          pdf.setDrawColor(0);
          pdf.setTextColor(0);
          pdf.setFillColor(255, 255, 255);
          pdf.roundedRect(20, 150, 170, 120, 1, 1, "FD");
          pdf.text(30, 180, "DNI: " + this.Datos[i].value.dni);
          pdf.text(
            30,
            190,
            "FECHA DE EVALUACIÓN: " + this.Datos[0].fecha_evaluacion
          );
          pdf.text(30, 200, "AULA: " + this.Datos[i].value.aula);
          pdf.text(100, 230, "FIRMA: ");
          pdf.setFillColor(138, 14, 35);

          pdf.roundedRect(20, 150, 170, 10, 1, 1, "FD");
          pdf.roundedRect(20, 250, 170, 15, 1, 1, "FD");
          pdf.addPage();
        }
        pdf.save("pdfR.pdf");
      }
    },

    prueba() {
      this.Datos = [
        {
          key: "Proceso",
          value: "2020-1",
          fecha_evaluacion: "10-02-2020",
        },
      ];
      var i = 1;
      this.pParticipantes.forEach((element) => {
        var aux = { key: i++, value: {} };
        var aux2 = {
          id: "",
          name: "",
          apellido: "",
          cargo: "",
          ubicacion: "",
          dni: "",
          aula: "",
        };
        var id_Participante = element.Participante_id;
        api.getParticipante(id_Participante).then((result) => {
          aux2.id = result.data.Nro_Documento;
          aux2.dni = result.data.Nro_Documento;
          aux2.name = result.data.Nombres;
          aux2.apellido = result.data.Apellidos;
        });
        var id_Rol = element.Rol_id;
        api.getRol(id_Rol).then((result) => {
          aux2.cargo = result.data.Rol;
        });
        var id_aula = element.Aula_id;
        api.getAula(id_aula).then((result) => {
          aux2.aula = result.data.Aula_Nro;
          api.getPabellon(result.data.Pabellon_id).then((resultA) => {
            aux2.ubicacion = resultA.data.Pabellon;
          });
        });
        aux.value = aux2;
        this.Datos.push(aux);
      });
    },
    guardarPParticipante() {
      const proceso = this.procesos.find(
        (r) => r.Proceso === this.Proceso_name
      );
      const participante = this.participantes.find(
        (r) => r.Nro_Documento.toString() === this.Participante_name.toString()
      );
      console.log(this.participantes);
      const rol = this.roles.find((r) => r.Rol === this.Rol_name);
      const aula = this.aulas.find(
        (r) => r.Código.toString() === this.Aula_name
      );
      let pParticipante = {
        Proceso_id: proceso.id,
        Participante_id: participante.id,
        Rol_id: rol.id,
        Aula_id: aula.id,

        Entrega_DJ: this.Entrega_DJ,
        Asistencia: this.Asistencia,
      };
      api.postProcesoParticipante(pParticipante).then((result) => {
        this.pParticipantes.push(result.data);
        console.log(this.pParticipantes);
      });
    },
    idPabellonToNombre(id) {
      api.getPabellon(id).then((result) => {
        this.aux = result.data;
        return this.aux.Pabellon;
      });
    },
    cargarBusqueda() {
      this.indexB = this.pParticipantes.findIndex(
        (r) => r.id.toString() === this.busqueda
      );
      console.log(this.indexB);
      api
        .getProceso(this.pParticipantes[this.indexB].Proceso_id)
        .then((result) => {
          this.aux = result.data;
          this.Proceso_name = this.aux.Proceso;
          console.log(this.aux);
        });
      api
        .getParticipante(this.pParticipantes[this.indexB].Participante_id)
        .then((result) => {
          this.aux = result.data;
          this.Participante_name = this.aux.Nro_Documento;
          console.log(this.aux);
        });
      api.getRol(this.pParticipantes[this.indexB].Rol_id).then((result) => {
        this.aux = result.data;
        this.Rol_name = this.aux.Rol;
        console.log(this.aux);
      });
      api.getAula(this.pParticipantes[this.indexB].Aula_id).then((result) => {
        this.aux = result.data;
        this.Aula_name = this.aux.Código;
        console.log(this.aux);
      });
      this.Entrega_DJ = this.pParticipantes[this.indexB].Entrega_DJ;
      this.Asistencia = this.pParticipantes[this.indexB].Asistencia;
    },
    modificarPParticipantes() {
      var mensaje = confirm(
        `Esta seguro que quiere modificar la asignación con ID: ${
          this.pParticipantes[this.indexB].id
        }?`
      );
      if (mensaje) {
        const proceso = this.procesos.find(
          (r) => r.Proceso === this.Proceso_name
        );
        const participante = this.participantes.find(
          (r) => r.Nro_Documento === this.Participante_name
        );
        const rol = this.roles.find((r) => r.Rol === this.Rol_name);
        const aula = this.aulas.find((r) => r.Código === this.Aula_name);
        let pParticipante = {
          Proceso_id: proceso.id,
          Participante_id: participante.id,
          Rol_id: rol.id,
          Aula_id: aula.id,

          Entrega_DJ: this.Entrega_DJ,
          Asistencia: this.Asistencia,
        };
        api
          .putProcesoParticipante(
            pParticipante,
            this.pParticipantes[this.indexB].id
          )
          .then((result) => {
            this.pParticipantes[this.indexB].Proceso_id =
              result.data.Proceso_id;
            this.pParticipantes[this.indexB].Participante_id =
              result.data.Participante_id;
            this.pParticipantes[this.indexB].Rol_id = result.data.Rol_id;
            this.pParticipantes[this.indexB].Aula_id = result.data.Aula_id;
            this.pParticipantes[this.indexB].Entrega_DJ =
              result.data.Entrega_DJ;
            this.pParticipantes[this.indexB].Asistencia =
              result.data.Asistencia;
            console.log(this.aulas[this.indexB]);
            this.indexB = -1;
            this.busqueda = "";
          });
      }
      //this.indexB = -1;
    },
    borrarPParticipante() {
      var mensaje = confirm(
        `Esta seguro que quiere BORRAR la asignación con ID: ${
          this.pParticipantes[this.indexB].id
        }?`
      );
      if (mensaje) {
        api
          .deleteProcesoParticipante(this.pParticipantes[this.indexB].id)
          .then((result) => {
            if (result.status === 200) {
              this.pParticipantes.splice([this.indexB], 1);
              this.indexB = -1;
              this.busqueda = "";
            }
          });
      }
      //his.indexB = -1;
    },
    borrarPorLista(id) {
      var mensaje = confirm(
        `Esta seguro que quiere BORRAR la asignacion con ID: ${id}?`
      );
      if (mensaje) {
        let indexL = this.pParticipantes.findIndex((r) => r.id === id);
        api.deleteProcesoParticipante(id).then((result) => {
          if (result.status === 200) {
            this.pParticipantes.splice([indexL], 1);
          }
        });
      }
    },
  },

  created() {
    api.getProcesosParticipantes().then((result) => {
      this.pParticipantes = result.data;
      console.log(this.pParticipantes);
    });
    api.getProcesos().then((result) => {
      this.procesos = result.data;
      console.log(this.procesos);
    });
    api.getParticipantes().then((result) => {
      this.participantes = result.data;
      console.log(this.participantes);
    });
    api.getRoles().then((result) => {
      this.roles = result.data;
      console.log(this.roles);
    });
    api.getAulas().then((result) => {
      this.aulas = result.data;
      console.log(this.aulas);
    });
  },
};
</script>
