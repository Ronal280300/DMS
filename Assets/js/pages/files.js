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

//Compartir archivos entre usuarios
//Levantar modal de compartir
const compartir = document.querySelectorAll(".compartir");
const modalUsuarios = document.querySelector("#modalUsuarios");
const myModalUs = new bootstrap.Modal(modalUsuarios);
const id_archivo = document.querySelector("#archivo");
const frmCompartir = document.querySelector("#frmCompartir");
const usuarios = document.querySelector("#usuarios");

const btnCompartir = document.querySelector("#btnCompartir");
const container_archivos = document.querySelector("#container-archivos");

const btnVerDetalle = document.querySelector('#btnVerDetalle'); 

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

  file.addEventListener("change", function (e) {
    console.log(e.target.files[0]);
    const data = new FormData();
    data.append("id_carpeta", id_carpeta.value);
    data.append("file", e.target.files[0]);
    const http = new XMLHttpRequest();
    const url = base_url + "admin/subirarchivo";
    http.open("POST", url, true);
    http.send(data);
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText);
        const res = JSON.parse(this.responseText);
        alertaPersonalizada(res.tipo, res.mensaje);
        if (res.tipo == "success") {
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

  btnVer.addEventListener("click", function () {
    window.location = base_url + "admin/ver/" + id_carpeta.value;
  });

  //Multiple Select
  $(".js-states").select2({
    theme: 'bootstrap-5',
    placeholder: "Buscar",
    maximumSelectionLength: 5,
    minimumInputLength: 2,
    dropdownParent: $("#modalUsuarios"),
    ajax: {
      url: base_url + "archivos/getUsuarios",
      dataType: "json",
      delay: 250,
      data: function (params) {
        return {
          q: params.term,
        };
      },
      processResults: function (data) {
        return {
          results: data,
        };
      },
      cache: true,
    },
  });

  //Agregar click al enclace compartir
  compartir.forEach((enlace) => {
    enlace.addEventListener("click", function (e) {
      compartirArchivo(e.target.id);
    });
  });

  frmCompartir.addEventListener('submit', function (e) {
    e.preventDefault();
    if (usuarios.value == '') {
      alertaPersonalizada("warning", "SELECCIONE UN USUARIO");
    } else {
      const data = new FormData(frmCompartir);
      const http = new XMLHttpRequest();
      const url = base_url + "archivos/compartir";
      http.open("POST", url, true);
      http.send(data);
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          console.log(this.responseText);
          const res = JSON.parse(this.responseText);
          alertaPersonalizada(res.tipo, res.mensaje);
          if (res.tipo == "success") {
            id_archivo.value = '';
            $('.js-states').val(null).trigger('change');
            myModalUs.hide();
          }
        }
      };
    }
  });

  //COMPARTIR ARCHIVOS POR CARPETA
  btnCompartir.addEventListener("click", function () {
    verArchivos();
  });

  //VER DETALLE COMPARTIDO
  btnVerDetalle.addEventListener('click', function () { 
    window.location = base_url + 'admin/verdetalle/' + id_carpeta.value;
  })

});

function compartirArchivo(id) {
  id_archivo.value = id;
  myModalUs.show();
}

function verArchivos() {
  const http = new XMLHttpRequest();
  const url = base_url + "archivos/verArchivos/" + id_carpeta.value;
  http.open("GET", url, true);
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      let html = '';
      if (res.length > 0) {
        res.forEach(archivo => {
          html += `<div class="form-check">
                     <input class="form-check-input" type="checkbox" value = "${archivo.id}" name = "archivos[]" 
                     id="flexCheckDefault_${archivo.id}">
                     <label class="form-check-label" for="flexCheckDefault_${archivo.id}">
                       ${archivo.nombre}
                     </label>
                   </div>`;
        });
        //cargarDetalle(id_carpeta.value);
      } else {
        html = `<div class="alert alert-danger alert-style-light" role="alert">
             Carpeta vacía
        </div>`;
      }
      container_archivos.innerHTML = html;
      myModal2.hide();
      myModalUs.show();

    }
  };
}




