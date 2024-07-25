<?php

class Compartidos extends Controller
 {
    private $id_usuario;

    public function __construct() {
        parent::__construct();
        session_start();
        $this->id_usuario = $_SESSION[ 'id' ];
    }

    public function index()
 {
        $data[ 'title' ] = 'Archvios Compartidos';
        $data['script'] = 'compartidos.js';
        $correo = $_SESSION['correo'];
        $data['archivos'] = $this->model->getArchivosCompartidos($correo);
        $this->views->getView( 'admin', 'compartidos', $data );
    }

    public function verDetalle($id_detalle)
    {
        $data = $this->model->getDetalle($id_detalle);
        echo json_encode($data);
        die();
    }

    
}

