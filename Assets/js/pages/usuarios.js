const frm = document.querySelector('#formulario');
const btnNuevo = document.querySelector('#btnNuevo');
const title = document.querySelector('#title');

//capturamos el id del modal
const modalRegistro = document.querySelector("#modalRegistro");

//Se crea una instancia con el modal
const myModal = new bootstrap.Modal(modalRegistro);

document.addEventListener('DOMContentLoaded', function(){
    btnNuevo.addEventListener('click', function(){
        title.textContent = 'NUEVO USUARIO';
        myModal.show();
    })
})