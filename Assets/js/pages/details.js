const id_carpeta = document.querySelector('#id_carpeta');
document.addEventListener("DOMContentLoaded", function () {
  $("#tblDetalle").DataTable({
    ajax: {
      url: base_url + "admin/listardetalle/" + id_carpeta.value,
      dataSrc: ''
    },
    columns: [
        { data: "correo" }, 
        { data: "nombre" },
        { data: "acciones" }],
    language: {
      url: "https://cdn.datatables.net/plug-ins/2.0.7/i18n/es-ES.json",
    },
    responsive: true,
    destroy: true,
    order: [[1, "desc"]],
  });
  return;
});
