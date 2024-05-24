const frm = document.querySelector("#formulario");
const btnNuevo = document.querySelector("#btnNuevo");
const title = document.querySelector("#title");

//capturamos el id del modal
const modalRegistro = document.querySelector("#modalRegistro");

//Se crea una instancia con el modal
const myModal = new bootstrap.Modal(modalRegistro);

let tblUsuarios;

document.addEventListener("DOMContentLoaded", function () {
  //CARGAR DATOS CON DATATABLES
  tblUsuarios = $("#tblUsuarios").DataTable({
    ajax: {
      url: base_url + "usuarios/listar",
      dataSrc: '',
    },
    columns: [
      { data: "acciones" },
      { data: "id" },
      { data: "nombres" },
      { data: "correo" },
      { data: "telefono" },
      { data: "direccion" },
      { data: "perfil" },
      { data: "fecha" },
    ],
    language: {
      url : 'https://cdn.datatables.net/plug-ins/2.0.7/i18n/es-ES.json'
    },
    responsive: true,
    order: [[1, 'desc']],
  });
  btnNuevo.addEventListener("click", function () {
    title.textContent = "NUEVO USUARIO";
    myModal.show();
  });

  //REGISTRAR USUARIOS UTILIZANDO AJAX
  frm.addEventListener("submit", function (e) {
    e.preventDefault();
    if (
      frm.nombre.value == "" ||
      frm.apellido.value == "" ||
      frm.correo.value == "" ||
      frm.telefono.value == "" ||
      frm.direccion.value == "" ||
      frm.clave.value == "" ||
      frm.rol.value == ""
    ) {
      alertaPersonalizada("warning", "TODOS LOS CAMPOS SON REQUERIDOS");
    } else {
      const data = new FormData(frm);

      const http = new XMLHttpRequest();

      const url = base_url + "usuarios/guardar";

      http.open("POST", url, true);

      http.send(data);

      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          alertaPersonalizada(res.tipo, res.mensaje);
          if (res.tipo == "success") {
            frm.reset();
            myModal.hide();
          }
        }
      };
    }
  });
})

function eliminar(id) {
  const url = base_url + 'usuarios/delete/' + id;
  eliminarRegistro('DESEA ELIMINAR EL USUARIO', 'EL USUARIO NO SE ELIMINARÁ DE FORMA PERMANETE', 'ELIMINAR', url, tblUsuarios);
}
