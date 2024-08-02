
let tblArchivos;

document.addEventListener("DOMContentLoaded", function () {
  //CARGAR DATOS CON DATATABLES
  tblArchivos = $("#tblArchivos").DataTable({
    ajax: {
      url: base_url + "archivos/listarHistorial",
      dataSrc: "",
    },
    columns: [
      { data: "id" },
      { data: "nombre" },
      { data: "tipo" },
      { data: "fecha_create" },
      { data: "elimina" }
    ],
    language: {
      url: "https://cdn.datatables.net/plug-ins/2.0.7/i18n/es-ES.json",
    },
    responsive: true,
    order: [[1, "desc"]],
  });

});

function eliminar(id) {
  const url = base_url + "usuarios/delete/" + id;
  eliminarRegistro(
    "DESEA ELIMINAR EL USUARIO",
    "EL USUARIO NO SE ELIMINARÁ DE FORMA PERMANETE",
    "ELIMINAR",
    url,
    tblArchivos
  );
}
