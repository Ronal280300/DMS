function alertaPerzonalizada(type, mensaje) {
    Swal.fire({
        position: 'top-end',
        icon: type,
        title: mensaje,
        showConfirmButton: false,
        timer: 1500
    })
}

function alertaRol() {
    Swal.fire({
        icon: "warning",
        title: 'Acceso Denegado',
        text: "No cuenta con permisos para ingresar a este módulo",
        confirmButtonText: 'Aceptar'
    });
}