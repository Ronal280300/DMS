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
        $data['title'] = 'Panel de administración';
        $data['script'] = 'files.js';
        $carpetas = $this->model->getCarpetas($this->id_usuario);
   
        for ($i=0; $i < count($carpetas); $i++) { 
            $carpetas[$i]['fecha'] = $this->time_ago(strtotime($carpetas[$i]['fecha_create']));
        }
        $data['carpetas'] = $carpetas;
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

    function time_ago ($fecha){
        $diferencia = time() - $fecha;
        if ($diferencia < 1) {
            return 'Justo ahora';
        }
        $condicion = array(
            12 * 30 * 24 * 60 * 60  => 'año',
            30 * 24 * 60 * 60 => 'mes',
            24 * 60 * 60 => 'dia',
            60 * 60 => 'hora',
            60 => 'minuto',
            1 => 'segundo'
        );
        foreach ($condicion as $secs => $str) {
            $d = $diferencia / $secs;
            if ($d >= 1) {
                //redondear
                $t = round($d);
                return 'hace ' . $t. ' ' .$str. ($t > 1 ? 's' : '');
            }
        }
    }

}

