<?php
class UsuariosModel extends Query{
    public function __construct()
    {
        parent::__construct();
    }

    public function getVerificar($item, $nombre)
    {
        $sql = "SELECT id FROM usuarios WHERE $item = '$nombre'";     
        return $this->select($sql); 
    }

    public function guardar($nombre,$apellido,$correo,$telefono,$direccion,$clave,$rol)
    { 	
        $sql = "INSERT INTO usuarios (nombre,apellido,correo,telefono,direccion,clave,rol) VALUES (?,?,?,?,?,?,?)";
        $datos = array($nombre,$apellido,$correo,$telefono,$direccion,$clave,$rol);
        return $this->insertar($sql,$datos);
    }

}

?>