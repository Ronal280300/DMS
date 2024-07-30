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
        $data[ 'title' ] = 'Archivos Compartidos';
        $data['script'] = 'compartidos.js';
        $correo = $_SESSION['correo'];
        $data['archivos'] = $this->model->getArchivosCompartidos($correo);
        $this->views->getView( 'admin', 'compartidos', $data );
    }

    public function verDetalle($id_detalle)
    {
        $data = $this->model->getDetalle($id_detalle);
        $data['fecha'] = time_ago(strtotime($data['fecha_add']));
        echo json_encode($data);
        die();
    }

    
}

