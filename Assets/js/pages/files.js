const btnUpload = document.querySelector("#btnUpload");
const btnNuevaCarpeta = document.querySelector("#btnNuevaCarpeta");
//capturamos el id del modal del archivo
const modalFile = document.querySelector("#modalFile");
//Se crea una instancia con el modal
const myModal = new bootstrap.Modal(modalFile);

//capturamos el id del modal de la carpeta
const modalCarpeta = document.querySelector("#modalCarpeta");
//Se crea una instancia con el modal
const myModal1 = new bootstrap.Modal(modalCarpeta);
const frmCarpeta = document.querySelector("#frmCarpeta");

document.addEventListener("DOMContentLoaded", function () {
  btnUpload.addEventListener("click", function () {
    myModal.show();
  });

  btnNuevaCarpeta.addEventListener("click", function () {
    myModal.hide();
    myModal1.show();
  });

  frmCarpeta.addEventListener("submit", function (e) {
    e.preventDefault();
    if (frmCarpeta.nombre.value == '') {
      alertaPersonalizada("warning", "EL CAMPO NOMBRE ES REQUERIDO");
    } else {
      const data = new FormData(frmCarpeta);
      const http = new XMLHttpRequest();
      const url = base_url + "admin/crearcarpeta";
      http.open("POST", url, true);
      http.send(data);
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          console.log(this.responseText);

          //  const res = JSON.parse(this.responseText);
          //  alertaPersonalizada(res.tipo, res.mensaje);
          //  if (res.tipo == 'success') {
          //frm.reset();
          //myModal.hide();
          //}
        }
      };
    }
  });
});
