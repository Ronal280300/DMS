<?php
class Admin extends Controller
{
    private $id_usuario;
    public function __construct() {
        parent::__construct();
        session_start();
        $this->id_usuario = $_SESSION['id'];
    }
    public function index()
    {
     $data['title'] = 'Panel de administración';
     $data['script'] = 'files.js';
     $this->views->getView('admin', 'home', $data);
    } 
  
    public function crearcarpeta()
    {
       
        $nombre = $_POST['nombre'];
        if (empty($nombre)) {
            $res = array( 'tipo' =>'warning', 'mensaje' => 'SE REQUIERE DE UN NOMBRE' );
        } else {
            $data = $this->model->crearcarpeta($nombre, $this->id_usuario);
        }
        
    }

}

