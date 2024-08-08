<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

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
                $res = array('tipo' => 'success', 'mensaje' => 'BIENVENIDO AL DMS');
            } else {
               $res = array('tipo' => 'warning', 'mensaje' => 'CONTRASEÑA INCORRECTA');
            }
            
        } else {
            $res = array('tipo' => 'warning', 'mensaje' => 'EL CORREO NO EXISTE');
        }
        
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function salir()
    {
        session_destroy();
        header('Location: ' . BASE_URL);
    }



    ///RESEAR CLAVE
    public function enviarCorreo($correo)
    {
        $consulta = $this->model->getUsuario($correo);
        if (!empty($consulta)) {
            $mail = new PHPMailer(true);
    
            try {
                $token = md5(date('YmdHis'));
                $this->model->updateToken($token, $correo);
                //Server settings
                $mail->SMTPDebug = 0; //Enable verbose debug output
                $mail->isSMTP(); //Send using SMTP
                $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
                $mail->SMTPAuth = true; //Enable SMTP authentication
                $mail->Username = 'rosepa2803@gmail.com'; //SMTP username
                $mail->Password = 'fkokxkknfvvbyjqp'; //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
                $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
                //Recipients
                $mail->setFrom('prileiva@gmail.com', 'Ronaldo');
                $mail->addAddress($correo);
    
                //Content
                $mail->isHTML(true); //Set email format to HTML
                $mail->Subject = 'Restablecer Clave';
    
                $mail->Body = '
                    <html>
                    <head>
                        <style>
                            body {
                                font-family: Arial, sans-serif;
                                line-height: 1.6;
                                background-color: #f4f4f4;
                                margin: 0;
                                padding: 0;
                            }
                            .container {
                                max-width: 600px;
                                margin: 40px auto;
                                background-color: #fff;
                                padding: 20px;
                                border-radius: 10px;
                                box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
                            }
                            .header {
                                text-align: center;
                                border-bottom: 1px solid #eaeaea;
                                padding-bottom: 20px;
                                margin-bottom: 20px;
                            }
                            .header img {
                                width: 100px;
                                height: auto;
                            }
                            .header h2 {
                                color: #333;
                                margin: 20px 0 0;
                            }
                            .content {
                                text-align: center;
                                color: #555;
                            }
                            .content p {
                                font-size: 16px;
                                margin: 20px 0;
                            }
                            .content a {
                                display: inline-block;
                                padding: 15px 30px;
                                font-size: 18px;
                                color: #fff;
                                background-color: #007bff;
                                text-decoration: none;
                                border-radius: 5px;
                                margin: 20px 0;
                            }
                            .footer {
                                text-align: center;
                                color: #999;
                                font-size: 12px;
                                border-top: 1px solid #eaeaea;
                                padding-top: 20px;
                                margin-top: 20px;
                            }
                        </style>
                    </head>
                    <body>
                        <div class="container">
                            <div class="header">
                                <h2>Restablece tu contraseña</h2>
                            </div>
                            <div class="content">
                                <p>¡Haz solicitado reestablecer tú contraseña!<br>
                                Si no ha sido tú, omite este mensaje.</p>
                                <p>
                                    <a href="'. BASE_URL . 'principal/reset/'.$token.'">Haz click aquí para cambiar</a>
                                </p>
                            </div>
                            <div class="footer">
                                <p>Si no solicitaste este cambio, por favor ignora este mensaje.</p>
                                <p>&copy; ' . date('Y') . ' Occidente Consultorías Ambientales. Todos los derechos reservados.</p>
                            </div>
                        </div>
                    </body>
                    </html>
                ';
    
                $mail->send();
                $res = array( 'tipo' =>'success', 'mensaje' => 'CORREO ENVIADO' );
            } catch (Exception $e) {
                $res = array( 'tipo' =>'error', 'mensaje' => $mail->ErrorInfo );
            }
        } else {
            $res = array('tipo' => 'warning', 'mensaje' => 'EL CORREO NO EXISTE');
        }
        echo json_encode( $res, JSON_UNESCAPED_UNICODE );
        die();
    }

    public function reset($token)
    {
        $data['title'] = 'Reestablecer Contraseña';
        $data['usuario'] = $this->model->getToken($token);
        if ($data['usuario']['token'] == $token) {
            $this->views->getView('principal', 'reset',$data);
        }else
        {
            header('Location: ' . BASE_URL . 'errors');
        }
    }

    public function cambiarPass()
    {
        $nueva = $_POST['clave_nueva'];
        $confirmar = $_POST['clave_confirmar'];
        $token = $_POST['token'];

        if (empty( $nueva ) || empty( $confirmar ) || empty( $token ) ) {
            $res = array( 'tipo' =>'warning', 'mensaje' => 'TODOS LOS CAMPOS SON REQUERIDOS' );
        } else {
            if ( $nueva != $confirmar ) {
                $res = array( 'tipo' =>'warning', 'mensaje' => 'LAS CONTRASEÑAS NO COINCIDEN' );
            } else {
                $result = $this->model->getToken($token);
                if ($token == $result['token'] ) {
                    $hash = password_hash( $nueva, PASSWORD_DEFAULT );
                    $data = $this->model->cambiarPass( $hash, $token );
                    if ( $data == 1 ) {
                        $res = array( 'tipo' =>'success', 'mensaje' => 'CONTRASEÑA ACTUALIZADA' );
                    } else {
                        $res = array( 'tipo' =>'warning', 'mensaje' => 'ERROR ACTUALIZAR' );
                    }
                }   
            }
        }
        echo json_encode( $res, JSON_UNESCAPED_UNICODE );
        die();
    }
}

