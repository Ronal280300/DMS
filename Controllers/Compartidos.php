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
        $this->views->getView( 'admin', 'compartidos', $data );
    }


    
}

