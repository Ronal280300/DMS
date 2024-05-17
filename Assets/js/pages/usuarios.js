const frm = document.querySelector("#formulario");
const btnNuevo = document.querySelector("#btnNuevo");
const title = document.querySelector("#title");

//capturamos el id del modal
const modalRegistro = document.querySelector("#modalRegistro");

//Se crea una instancia con el modal
const myModal = new bootstrap.Modal(modalRegistro);

document.addEventListener("DOMContentLoaded", function () {
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
});
