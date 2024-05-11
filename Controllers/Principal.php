<?php
class Principal extends Controller
{
    public function __construct() {
        parent::__construct();
        session_start();
    }
    public function index(){
        $data['title'] = 'Inciar Sesión';
        $this->views->getView('principal', 'index',$data);
    } 
    #### LOGIN ###
    public function validar()
    {
        $correo = $_POST ['correo'];
        $clave = $_POST ['clave'];
        $data = $this->model->getUsuario($correo);
        if (!empty($data)) {
            if (password_verify($clave, $data['clave'])) {
                $_SESSION ['id'] = $data['id'];
                $_SESSION ['correo'] = $data['correo'];
                $_SESSION ['nombre'] = $data['nombre'];
                $res = array('tipo' => 'success', 'mensaje' => 'Bienvenido al DMS');
            } else {
               $res = array('tipo' => 'warning', 'mensaje' => 'Contraseña incorrecta');
            }
            
        } else {
            $res = array('tipo' => 'warning', 'mensaje' => 'El correo no existe');
        }
        
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function salir()
    {
        session_destroy();
        header('Location: ' . BASE_URL);
    }
}

