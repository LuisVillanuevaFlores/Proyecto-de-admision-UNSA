import Vue from "vue";
import Router from "vue-router";
import Home from "@/views/Home";
import Roles from "@/views/Roles";
import Aulas from "@/views/Aulas";
import Pabellones from "@/views/Pabellones";
import Procesos from "@/views/Procesos";
import Participantes from "@/views/Participantes";
import ProcesosParticipantes from "@/views/ProcesosParticipantes";

Vue.use(Router);

export default new Router({
  mode: "history",

  routes: [
    {
      path: "/",
      name: "home",
      component: Home
    },
    {
      path: "/roles",
      name: "roles",
      component: Roles
    },
    {
      path: "/aulas",
      name: "aulas",
      component: Aulas
    },
    {
      path: "/pabellones",
      name: "pabellones",
      component: Pabellones
    },
    {
      path: "/procesos",
      name: "procesos",
      component: Procesos
    },
    {
      path: "/participantes",
      name: "participantes",
      component: Participantes
    },
    {
      path: "/procesos-participantes",
      name: "procesos-participantes",
      component: ProcesosParticipantes
    }
  ]
});
