<?php

class UsuariosModel extends Query {
    public function __construct()
 {
        parent::__construct();
    }

    public function getUsuarios()
 {
        $sql = 'SELECT id, nombre, apellido, correo, telefono, direccion, clave, rol, perfil, fecha FROM usuarios WHERE estado = 1';

        return $this->selectAll( $sql );

    }

    public function getVerificar( $item, $nombre, $id )
 {
        if ($id > 0) {
            $sql = "SELECT id FROM usuarios WHERE $item = '$nombre' AND id != $id AND estado = 1";
        } else {
            $sql = "SELECT id FROM usuarios WHERE $item = '$nombre' AND estado = 1";     
        }
        return $this->select( $sql );
    }

    public function registrar( $nombre, $apellido, $correo, $telefono, $direccion, $clave, $rol )
    {
        $sql = 'INSERT INTO usuarios (nombre,apellido,correo,telefono,direccion,clave,rol) VALUES (?,?,?,?,?,?,?)';
        $datos = array( $nombre, $apellido, $correo, $telefono, $direccion, $clave, $rol );
        return $this->insertar( $sql, $datos );
    }

    public function delete( $id )
    {
        $sql = 'UPDATE usuarios SET estado = ? WHERE id = ?';
        $datos = array( 0, $id );
        return $this->save( $sql, $datos );
    }

    public function getUsuario($id)
    {
        $sql = "SELECT id, nombre, apellido, correo, telefono, direccion, clave, rol, perfil, fecha FROM usuarios WHERE id = $id";
        return $this->select($sql);
    }

    public function modificar( $nombre, $apellido, $correo, $telefono, $direccion, $rol, $id )
    {
        $sql = 'UPDATE usuarios SET nombre=?, apellido=?, correo=?, telefono=?, direccion=?, rol=? WHERE id =?';
        $datos = array( $nombre, $apellido, $correo, $telefono, $direccion, $rol, $id);
        return $this->save( $sql, $datos );
    }
}
?>