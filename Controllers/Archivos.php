<?php

class Archivos extends Controller
 {
    private $id_usuario;

    public function __construct() {
        parent::__construct();
        session_start();
        $this->id_usuario = $_SESSION[ 'id' ];
    }

    public function index()
    {
        $data[ 'title' ] = 'Archivos';
        $data[ 'active' ] = 'todos';
        $data[ 'script' ] = 'files.js';
        $data[ 'archivos' ] = $this->model->getArchivos( $this->id_usuario );

        $carpetas = $this->model->getCarpetas( $this->id_usuario );
        for ( $i = 0; $i < count( $carpetas );
        $i++ ) {
            $carpetas[ $i ][ 'color' ] = substr( md5( $carpetas[ $i ][ 'id' ] ), 0, 6 );
            $carpetas[ $i ][ 'fecha' ] = time_ago( strtotime( $carpetas[ $i ][ 'fecha_create' ] ) );
        }
        $data[ 'carpetas' ] = $carpetas;

        $this->views->getView( 'archivos', 'index', $data );
    }

    public function getUsuarios()
    {
        $valor = $_GET[ 'q' ];
        $data = $this->model->getUsuarios( $valor );
        for ( $i = 0; $i < count( $data );
        $i++ ) {

            $data[ $i ][ 'text' ] = $data[ $i ][ 'correo' ];
        }
        echo json_encode( $data );
        die();
    }

    public function compartir()
    {
        $usuarios = $_POST[ 'usuarios' ];
        if ( empty( $_POST[ 'archivos' ] ) ) {
            $res = array( 'tipo' => 'warning', 'mensaje' => 'SELECCIONE UN ARCHIVO' );
        } else {
            $archivos = $_POST[ 'archivos' ];
            $res = 0;
            for ( $i = 0; $i < count( $archivos );
            $i++ ) {
                for ( $j = 0; $j < count( $usuarios );
                $j++ ) {
                    $dato = $this->model->getUsuario( $usuarios[ $j ] );
                    $result = $this->model->getDetalle( $dato[ 'correo' ], $archivos[ $i ] );
                    if ( empty( $result ) ) {
                        $res = $this->model->registrarDetalle( $dato[ 'correo' ], $archivos[ $i ],
                        $this->id_usuario );
                    } else {
                        $res = 1;
                    }

                }
            }
            if ( $res > 0 ) {
                $res = array( 'tipo' => 'success', 'mensaje' => 'ARCHIVOS COMPARTIDOS' );
            } else {
                $res = array( 'tipo' =>'error', 'mensaje' => 'ERROR AL COMPARTIR ARCHIVOS' );
            }

        }
        echo json_encode( $res );
        die();
    }

    public function verArchivos ( $id_carpeta )
    {
        $data = $this->model->getArchivosCarpeta($id_carpeta);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function buscarCarpeta($id)
    {
        $data = $this->model->getCarpeta($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }


    //ELIMINAR ARCHIVO COMPARTIDO

    public function eliminarCompartido($id)
    {
        $fecha = date('Y-m-d H:i:s');
        $nueva = date("Y-m-d H:i:s", strtotime($fecha . '+30 days'));
        $data = $this->model->eliminarCompartido($nueva, $id);
        if ($data == 1) {
            $res = array('tipo' => 'success', 'mensaje' => 'ARCHIVO ELIMINADO', 'fecha_eliminacion' => $nueva);
        } else {
            $res = array('tipo' => 'error', 'mensaje' => 'ERROR AL ELIMINAR');
        }
    
        echo json_encode($res);
        die();
    }
    

}

