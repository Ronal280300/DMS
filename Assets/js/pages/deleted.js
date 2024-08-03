
let tblArchivos;

document.addEventListener("DOMContentLoaded", function () {
  //CARGAR DATOS CON DATATABLES
  tblArchivos = $("#tblArchivos").DataTable({
    ajax: {
      url: base_url + "archivos/listarHistorial",
      dataSrc: "",
    },
    columns: [
      { data: "accion" },
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

function restaurar(id) {
  const url = base_url + "archivos/delete/" + id;
  eliminarRegistro(
    "DESEA RESTAURAR EL ARCHIVO",
    "EL ARCHIVO SE RESTAURARÁ EN SU RESPECTIVA CARPETA",
    "RESTAURAR",
    url,
    tblArchivos
  );
}
