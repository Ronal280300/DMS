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

    public function listar(){
        $data = $this->model->getUsuarios();
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    function guardar() {
        $nombre = $_POST[ 'nombre' ];
        $apellido = $_POST[ 'apellido' ];
        $correo = $_POST[ 'correo' ];
        $telefono = $_POST[ 'telefono' ];
        $direccion = $_POST[ 'direccion' ];
        $clave = $_POST[ 'clave' ];
        $rol = $_POST[ 'rol' ];

        if ( empty( $nombre ) || empty( $apellido ) || empty( $correo )
        || empty( $telefono ) || empty( $direccion ) || empty( $clave ) || empty( $rol ) ) {
            $res = array( 'tipo' =>'warning', 'mensaje' => 'TODOS LOS CAMPOS SON REQUERIDOS' );
        } else {

            // COMPROBAR DATOS REPETIDOS ( SI EL CORREO EXISTE )
            $verificarCorreo = $this->model->getVerificar( 'correo', $correo );
            if ( empty( $verificarCorreo ) ) {

                // COMPROBAR DATOS REPETIDOS ( SI EL TELEFONO EXISTE )
                $verificarTel = $this->model->getVerificar( 'telefono', $telefono );

                if ( empty( $verificarTel ) ) {
                    $hash = password_hash( $clave, PASSWORD_DEFAULT );
                    $data = $this->model->guardar( $nombre, $apellido, $correo, $telefono, $direccion, $hash, $rol );
                    if ( $data > 0 ) {
                        $res = array( 'tipo' =>'success', 'mensaje' => 'USUARIO REGISTRADO' );
                    } else {
                        $res = array( 'tipo' =>'error', 'mensaje' => 'ERROR AL REGISTRAR' );
                    }
                } else {
                    $res = array( 'tipo' =>'warning', 'mensaje' => 'EL TELEFONO YA EXISTE' );
                }
            } else {
                $res = array( 'tipo' =>'warning', 'mensaje' => 'EL CORREO YA EXISTE' );
            }
        }
        echo json_encode( $res, JSON_UNESCAPED_UNICODE );
        die();
    }

}
