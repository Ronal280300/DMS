<?php
class PrincipalModel extends Query{
    public function __construct()
    {
        parent::__construct();
    }

    public function getUsuario($correo)
    { 	
        return $this->select("SELECT * FROM usuarios WHERE correo = '$correo' and estado = 1");
    }

}

?>