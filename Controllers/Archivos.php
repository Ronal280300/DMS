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
        $data['title'] = 'Archivos';
        $data['active'] = 'todos';
        $data['script'] = 'files.js';
        $data['archivos'] = $this->model->getArchivos( $this->id_usuario );

        $carpetas = $this->model->getCarpetas( $this->id_usuario );
         for ( $i = 0; $i < count( $carpetas );
        $i++ ) {
            $carpetas[ $i ]['color'] = substr( md5( $carpetas[ $i ][ 'id' ] ), 0, 6 );
            $carpetas[ $i ]['fecha'] = time_ago( strtotime( $carpetas[ $i ]['fecha_create'] ) );
        }
        $data['carpetas'] = $carpetas;


        $this->views->getView('archivos', 'index', $data);
    }

    public function getUsuarios()
    {
        $valor = $_GET['q'];
        $data = $this->model->getUsuarios($valor);
        for ($i=0; $i < count($data); $i++) { 
            $data[$i]['text'] = $data[$i]['correo'];
        }
        echo json_encode($data);
        die();
    }

    public function compartir()
    {
        $id_archivo = $_POST['id_archivo'];
        $usuarios = $_POST['usuarios'];
        $res = 0;
        for ($i=0; $i < count($usuarios); $i++) { 
        $dato = $this->model->getUsuario($usuarios[$i]);
        $res = $this->model->registrarDetalle($dato['correo'], $id_archivo,$this->id_usuario);
        }
        if ($res > 0) {
            $res = array('tipo' => 'success', 'mensaje' => 'ARCHIVO COMPARTIDO');
        } else {
            $res = array('tipo' =>'error','mensaje' => 'ERROR AL COMPARTIR ARCHIVO');
        }
        echo json_encode($res);
        die();
    }
}

