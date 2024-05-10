//alertaPersonalizada('success','Mensaje de prueba de login')

const frm = document.querySelector('#formulario');
const correo = document.querySelector('#correo');
const clave = document.querySelector('#clave');

//Codigo para capturar el formulario del login 
document.addEventListener ('DOMContentLoaded', function() {
frm.addEventListener('submit', function(e){
    e.preventDefault();
   if(correo.value == '' || clave.value == ''){
    alertaPersonalizada('warning','Los campos con * son requeridos')
   }else{
    const data = new FormData(frm);
    const http = new XMLHttpRequest();
 
    const url = base_url + 'principal/validar';
    
    http.open("POST", url, true);
  
    http.send(data);
  
    http.onreadystatechange = function() {
    
        if (this.readyState == 4 && this.status == 200) {
        
            console.log(this.responseText);
            
        }
        
    };

   }
    })
})