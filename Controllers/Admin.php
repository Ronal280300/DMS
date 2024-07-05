<?php

class Admin extends Controller
 {
    private $id_usuario;

    public function __construct() {
        parent::__construct();
        session_start();
        $this->id_usuario = $_SESSION[ 'id' ];
    }

    public function index()
 {
        $data[ 'title' ] = 'Panel de administración';
        $data[ 'script' ] = 'files.js';
        $this->views->getView( 'admin', 'home', $data );
    }

    public function crearcarpeta()
 {

        $nombre = $_POST[ 'nombre' ];
        if ( empty( $nombre ) ) {
            $res = array( 'tipo' =>'warning', 'mensaje' => 'SE REQUIERE DE UN NOMBRE' );
        } else {
            //Verificar el nombre
            $verificarNom = $this->model->getVerificar('nombre', $nombre, $this->id_usuario, 0 );

            if ( empty( $verificarNom ) ) {
                $data = $this->model->crearcarpeta( $nombre, $this->id_usuario);
                if ( $data > 0 ) {
                    $res = array( 'tipo' =>'success', 'mensaje' => 'CARPETA CREADA' );
                } else {
                    $res = array( 'tipo' =>'error', 'mensaje' => 'ERROR AL CREAR CARPETA' );
                }
            } else {
                $res = array( 'tipo' =>'warning', 'mensaje' => 'LA CARPETA YA EXISTE' );
            }
            
        }
        echo json_encode( $res, JSON_UNESCAPED_UNICODE );
            die();

    }

}

