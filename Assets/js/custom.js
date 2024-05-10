alertaPersonalizada('success','Mensaje de prueba')
function alertaPersonalizada(type,mensaje) { 
    Swal.fire({
        position: "top-end",
        icon: type,
        title: mensaje,
        showConfirmButton: false,
        timer: 1500
      });
      



      function eliminarRegistro(title, text,icono,accion, url){
        Swal.fire({
            title: title,
            text: text,
            icon: icono,
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: accion
          }).then((result) => {
            if (result.isConfirmed) {
              Swal.fire({
                title: "Deleted!",
                text: "Your file has been deleted.",
                icon: "success"
              });
            }
          });
      }



      
function acceso(){
    let timerInterval;
Swal.fire({
  title: "Auto close alert!",
  html: "I will close in <b></b> milliseconds.",
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
  }
}).then((result) => {
  /* Read more about handling dismissals below */
  if (result.dismiss === Swal.DismissReason.timer) {
    console.log("I was closed by the timer");
  }
});
}
      
}