const inputBusqueda = document.querySelector('#inputBusqueda');
const container_result = document.querySelector('#container-result');
document.addEventListener('DOMContentLoaded', function () {
  inputBusqueda.addEventListener('keyup', function (e) {
    if (e.target.value.length > 1) {
      buscarArchivos(e.target.value);
    }
  });

  inputBusqueda.addEventListener('blur', function (e) {
    e.target.value = '';
    container_result.innerHTML = '';
  });
})

function alertaPersonalizada(type, mensaje) {
  Swal.fire({
    position: "top-end",
    icon: type,
    title: mensaje,
    showConfirmButton: false,
    timer: 1500,
  });
}
function eliminarRegistro(title, text, accion, url, table) {
  Swal.fire({
    title: title,
    text: text,
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: accion,
  }).then((result) => {
    if (result.isConfirmed) {
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          alertaPersonalizada(res.tipo, res.mensaje);
          if (res.tipo == "success") {
            if (table != null) {
              table.ajax.reload();
            } else {
              setTimeout(() => {
                window.location.reload();
              }, 1500);
            }
          }
        }
      };
    }
  });
}

function buscarArchivos(valor) {
  const url = base_url + 'archivos/busqueda/' + valor ;
  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      let html = '';
      if (res.length > 0) {
        res.forEach(archivo => {
          html += `<div class="card">
                   <div class="card-body">
                     <h5 class="card-title">
                      <a href=${base_url + 'Assets/archivos/' + archivo.id_carpeta + '/' + 
                      archivo.nombre}" download="${archivo.nombre}" }">${archivo.nombre}</a>
                    </h5>
                     </div>
                  </div>`;
        });
      } else {
        html = `<div class="alert alert-custom alert-indicator-top indicator-warning" role="alert">
                       <div class="alert-content">
                    <span class="alert-text">No se encontraron archivos..</span>
                  </div>
                </div>`;
      }
      
      container_result.innerHTML = html;
    }
  };
}
