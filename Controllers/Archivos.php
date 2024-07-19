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
        $data['archivos'] = $this->model->getArchivos( $this->id_usuario );

        $carpetas = $this->model->getCarpetas( $this->id_usuario );
         for ( $i = 0; $i < count( $carpetas );
        $i++ ) {
            $carpetas[ $i ][ 'color' ] = substr( md5( $carpetas[ $i ][ 'id' ] ), 0, 6 );
            $carpetas[ $i ][ 'fecha' ] = time_ago( strtotime( $carpetas[ $i ][ 'fecha_create' ] ) );
        }
        $data[ 'carpetas' ] = $carpetas;


        $this->views->getView( 'archivos', 'index', $data );
    }

}

