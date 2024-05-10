//alertaPersonalizada('success','Mensaje de prueba de login')

const frm = document.querySelector("#formulario");
const correo = document.querySelector("#correo");
const clave = document.querySelector("#clave");

//Codigo para capturar el formulario del login
document.addEventListener("DOMContentLoaded", function () {
  frm.addEventListener("submit", function (e) {
    e.preventDefault();
    if (correo.value == "" || clave.value == "") {
      alertaPersonalizada("warning", "Los campos con * son requeridos");
    } else {
      const data = new FormData(frm);
      const http = new XMLHttpRequest();

      const url = base_url + "principal/validar";

      http.open("POST", url, true);

      http.send(data);

      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          alertaPersonalizada(res.tipo, res.mensaje);
          if (res.tipo == "success") {
            let timerInterval;
            Swal.fire({
              title: res.mensaje,
              html: "Será redireccionado en <b></b> milliseconds.",
              timer: 2000,
              timerProgressBar: true,
              didOpen: () => {
                Swal.showLoading();
                const timer = Swal.getPopup().querySelector("b");
                timerInterval = setInterval(() => {
                  timer.textContent = `${Swal.getTimerLeft()}`;
                }, 100);
              },
              willClose: () => {
                clearInterval(timerInterval);
              },
            }).then((result) => {
              /* Read more about handling dismissals below */
              if (result.dismiss === Swal.DismissReason.timer) {
                window.location = base_url + "admin";
              }
            });
          }
        }
      };
    }
  });
});
