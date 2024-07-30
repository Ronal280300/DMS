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

    public function listar() {
        $data = $this->model->getUsuarios();
        for ( $i = 0; $i < count( $data );
        $i++ ) {
            if ( $data [ $i ][ 'id' ] == 1 ) {
                $data[ $i ][ 'acciones' ] = 'SUPER ADMIN';
            } else {
                $data[ $i ][ 'acciones' ] =
                '<div>
                    <a href="#" class ="btn btn-info btn-sm" onclick = "editar('.$data[ $i ][ 'id' ].')">
                        Editar
                     </a>
                    <a href="#" class = "btn btn-danger btn-sm" onclick = "eliminar('.$data[ $i ][ 'id' ].')">
                        Eliminar
                    </a>
                 </div>';
            }

            $data[ $i ][ 'nombres' ] = $data[ $i ][ 'nombre' ] . ' ' . $data[ $i ][ 'apellido' ];
        }
        echo json_encode( $data, JSON_UNESCAPED_UNICODE );
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
        $id_usuario = $_POST[ 'id_usuario' ];

        if ( empty( $nombre ) || empty( $apellido ) || empty( $correo )
        || empty( $telefono ) || empty( $direccion ) || empty( $clave ) || empty( $rol ) ) {
            $res = array( 'tipo' =>'warning', 'mensaje' => 'TODOS LOS CAMPOS SON REQUERIDOS' );
        } else {
            if ( $id_usuario == '' ) {
                // COMPROBAR DATOS REPETIDOS ( SI EL CORREO EXISTE )
                $verificarCorreo = $this->model->getVerificar( 'correo', $correo, 0 );
                if ( empty( $verificarCorreo ) ) {
                    // COMPROBAR DATOS REPETIDOS ( SI EL TELEFONO EXISTE )
                    $verificarTel = $this->model->getVerificar( 'telefono', $telefono, 0 );

                    if ( empty( $verificarTel ) ) {
                        $hash = password_hash( $clave, PASSWORD_DEFAULT );
                        $data = $this->model->registrar( $nombre, $apellido, $correo, $telefono, $direccion, $hash, $rol );
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
            } else {

                // COMPROBAR DATOS REPETIDOS ( SI EL CORREO EXISTE )
                $verificarCorreo = $this->model->getVerificar( 'correo', $correo, $id_usuario);
                if ( empty( $verificarCorreo ) ) {
                    // COMPROBAR DATOS REPETIDOS ( SI EL TELEFONO EXISTE )
                    $verificarTel = $this->model->getVerificar( 'telefono', $telefono, $id_usuario );

                    if ( empty( $verificarTel ) ) {
                        $hash = password_hash( $clave, PASSWORD_DEFAULT );
                        $data = $this->model->modificar( $nombre, $apellido, $correo, $telefono, $direccion, $rol, $id_usuario );
                        if ( $data == 1 ) {
                            $res = array( 'tipo' =>'success', 'mensaje' => 'USUARIO EDITADO' );
                        } else {
                            $res = array( 'tipo' =>'error', 'mensaje' => 'ERROR AL EDITAR' );
                        }
                    } else {
                        $res = array( 'tipo' =>'warning', 'mensaje' => 'EL TELEFONO YA EXISTE' );
                    }
                } else {
                    $res = array( 'tipo' =>'warning', 'mensaje' => 'EL CORREO YA EXISTE' );
                }
            }
        }
        echo json_encode( $res, JSON_UNESCAPED_UNICODE );
        die();
    }

    public function delete( $id ) 
 {
        $data = $this->model->delete( $id );
        if ( $data == 1 ) {
            $res = array( 'tipo' => 'success', 'mensaje' => 'USUARIO ELIMINADO' );
        } else {
            $res = array( 'tipo' =>'warning', 'mensaje' => 'ERROR AL ELIMINAR' );
        }
        echo json_encode( $res, JSON_UNESCAPED_UNICODE );
        die();
    }

    public function editar($id) 
    {
        $data = $this->model->getUsuario($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE );
        die();
    }

}
