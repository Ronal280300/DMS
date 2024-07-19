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

const btnSubirArchivo = document.querySelector("#btnSubirArchivo");
const file = document.querySelector("#file");

//capturamos el id del modal de la carpeta
const modalCompartir = document.querySelector("#modalCompartir");
//Se crea una instancia con el modal
const myModal2 = new bootstrap.Modal(modalCompartir);
const id_carpeta = document.querySelector("#id_carpeta");

const carpetas = document.querySelectorAll(".carpetas");
const btnSubir = document.querySelector("#btnSubir");

//ver
const btnVer = document.querySelector("#btnVer");

document.addEventListener("DOMContentLoaded", function () {
  btnUpload.addEventListener("click", function () {
    myModal.show();
  });

  btnNuevaCarpeta.addEventListener("'click", function () {
    myModal.hide();
    myModal1.show();
  });

  frmCarpeta.addEventListener('submit', function (e) {
    e.preventDefault();
    if (frmCarpeta.nombre.value == "") {
      alertaPersonalizada("warning", "EL CAMPO NOMBRE ES REQUERIDO");
    } else {
      const data = new FormData(frmCarpeta);
      const http = new XMLHttpRequest();
      const url = base_url + "admin/crearcarpeta";
      http.open("POST", url, true);
      http.send(data);
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          alertaPersonalizada(res.tipo, res.mensaje);
          if (res.tipo == "success") {
            setTimeout(() => {
              window.location.reload();
            }, 1500);
          }
        }
      };
    }
  });

  //Subir Archivos
  btnSubirArchivo.addEventListener("click", function (e) {
    myModal.hide();
    file.click();
  });

  file.addEventListener('change', function (e) {
    console.log(e.target.files[0]);
    const data = new FormData();
    data.append('id_carpeta', id_carpeta.value);
    data.append('file', e.target.files[0]);
    const http = new XMLHttpRequest();
    const url = base_url + "admin/subirarchivo";
    http.open("POST", url, true);
    http.send(data);
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText);
        const res = JSON.parse(this.responseText);
        alertaPersonalizada(res.tipo, res.mensaje);
        if (res.tipo == 'success') {
          setTimeout(() => {
            window.location.reload();
          }, 1500);
        }
      }
    };
  });

  carpetas.forEach((carpeta) => {
    carpeta.addEventListener("click", function (e) {
      id_carpeta.value = e.target.id;
      myModal2.show();
    });
  });

   //Subir Archivos
   btnSubir.addEventListener("click", function (e) {
    myModal2.hide();
    file.click();
  });

  btnVer.addEventListener('click', function(){
    window.location = base_url + 'admin/ver/' + id_carpeta.value;
    
  })

});
