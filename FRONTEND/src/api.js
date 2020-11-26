import axios from "axios";
const API = "http://127.0.0.1:8000/api";

function getRoles() {
  return axios.get(`${API}/roles/`, {});
}
function getRol(id) {
  return axios.get(`${API}/roles/${id}`, {});
}
function postRol(rol) {
  return axios.post(`${API}/roles/`, rol);
}
function putRol(rol, id) {
  return axios.put(`${API}/roles/${id}`, rol);
}
function deleteRol(id) {
  return axios.delete(`${API}/roles/${id}`);
}

function getAulas() {
  return axios.get(`${API}/aulas/`, {});
}
function getAula(id) {
  return axios.get(`${API}/aulas/${id}`, {});
}
function postAula(rol) {
  return axios.post(`${API}/aulas/`, rol);
}
function putAula(rol, id) {
  return axios.put(`${API}/aulas/${id}`, rol);
}
function deleteAula(id) {
  return axios.delete(`${API}/aulas/${id}`);
}

function getPabellones() {
  return axios.get(`${API}/pabellones/`, {});
}
function getPabellon(id) {
  return axios.get(`${API}/pabellones/${id}`, {});
}
function postPabellon(rol) {
  return axios.post(`${API}/pabellones/`, rol);
}
function putPabellon(rol, id) {
  return axios.put(`${API}/pabellones/${id}`, rol);
}
function deletePabellon(id) {
  return axios.delete(`${API}/pabellones/${id}`);
}

function getProcesos() {
  return axios.get(`${API}/procesos/`, {});
}
function getProceso(id) {
  return axios.get(`${API}/procesos/${id}`, {});
}
function postProceso(rol) {
  return axios.post(`${API}/procesos/`, rol);
}
function putProceso(rol, id) {
  return axios.put(`${API}/procesos/${id}`, rol);
}
function deleteProceso(id) {
  return axios.delete(`${API}/procesos/${id}`);
}

function getParticipantes() {
  return axios.get(`${API}/participantes/`, {});
}
function getParticipante(id) {
  return axios.get(`${API}/participantes/${id}`, {});
}
function postParticipante(rol) {
  return axios.post(`${API}/participantes/`, rol);
}
function putParticipante(rol, id) {
  return axios.put(`${API}/participantes/${id}`, rol);
}
function deleteParticipante(id) {
  return axios.delete(`${API}/participantes/${id}`);
}

function getProcesosParticipantes() {
  return axios.get(`${API}/procesoParticipantes/`, {});
}
function getProcesoParticipante(id) {
  return axios.get(`${API}/procesoParticipantes/${id}`, {});
}
function postProcesoParticipante(rol) {
  return axios.post(`${API}/procesoParticipantes/`, rol);
}
function putProcesoParticipante(rol, id) {
  return axios.put(`${API}/procesoParticipantes/${id}`, rol);
}
function deleteProcesoParticipante(id) {
  return axios.delete(`${API}/procesoParticipantes/${id}`);
}

export default {
  getRoles,
  getRol,
  postRol,
  putRol,
  deleteRol,
  getAulas,
  getAula,
  postAula,
  putAula,
  deleteAula,
  getPabellones,
  getPabellon,
  postPabellon,
  putPabellon,
  deletePabellon,
  getProcesos,
  getProceso,
  postProceso,
  putProceso,
  deleteProceso,
  getParticipantes,
  getParticipante,
  postParticipante,
  putParticipante,
  deleteParticipante,
  getProcesosParticipantes,
  getProcesoParticipante,
  postProcesoParticipante,
  putProcesoParticipante,
  deleteProcesoParticipante
};
