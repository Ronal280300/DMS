<?php
class Principal extends Controller
{
    public function __construct() {
        parent::__construct();
    }
    public function index(){
        $data['title'] = 'Inciar Sesión';
        $this->views->getView('principal', 'index',$data);
    } 
    #### LOGIN ###
    public function validar()
    {
        $correo = $_POST ['correo'];
        $clave = $_POST ['clave'];
        $data = $this->model->getUsuario($correo);
        print_r($data);
    }
}

