<?php

class Usuarios extends Controller
 {
    public function __construct() {
        parent::__construct();
        session_start();
    }

    public function index()
 {
        $data[ 'title' ] = 'Gestión de usuarios';
        $data[ 'script' ] = 'usuarios.js';
        $this->views->getView( 'usuarios', 'index', $data );
    }

}
