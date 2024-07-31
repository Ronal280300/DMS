<?php

class ArchivosModel extends Query {
    public function __construct()
     {
        parent::__construct();
    }

    public function getArchivos($id_usuario )
    {
        $sql = "SELECT a.* FROM archivos a INNER JOIN carpetas c on a.id_carpeta = c.id WHERE c.id_usuario = $id_usuario ORDER BY a.id DESC";

        return $this->selectAll( $sql );
    }

    public function getCarpetas( $id_usuario )
    {
        $sql = "SELECT * FROM carpetas WHERE id_usuario = $id_usuario AND estado = 1 ORDER BY id DESC";

        return $this->selectAll( $sql );
    }

    public function getUsuarios($valor,$id_usuario)
    {
        $sql = "SELECT * FROM usuarios WHERE correo LIKE '%" . $valor . "%' AND id != $id_usuario 
        AND estado = 1 LIMIT 10";

        return $this->selectAll( $sql );
    }

    public function getUsuario($id_usuario)
    {
        $sql = "SELECT correo FROM usuarios WHERE id = $id_usuario";
        return $this->select( $sql );
    }

    public function registrarDetalle($correo, $id_archivo, $id_usuario)
    {
        $sql = "INSERT INTO detalle_archivos (correo, id_archivo, id_usuario) VALUES (?,?,?) ";
        $array = [$correo, $id_archivo, $id_usuario];
        return $this->insertar( $sql, $array);
    }

    public function getDetalle($correo,$id_archivo)
    {
        $sql = "SELECT id FROM detalle_archivos WHERE correo = '$correo' AND id_archivo = $id_archivo";
        return $this->select( $sql );
    }

    public function getArchivosCarpeta($id_carpeta)
    {
        $sql = "SELECT * FROM archivos WHERE id_carpeta = $id_carpeta";
        return $this->selectAll( $sql );
    }

    public function eliminarCompartido($fecha,$id)
    {
        $sql = "UPDATE detalle_archivos SET estado = ?, elimina = ? WHERE id = ?";
        $array = [0, $fecha ,$id];
        return $this->save( $sql, $array);
    }

    public function getCarpeta( $id_archivo )
    {
        $sql = "SELECT id, id_carpeta FROM archivos WHERE id = $id_archivo";

        return $this->select( $sql );
    }

    public function eliminar($fecha,$id)
    {
        $sql = "UPDATE archivos SET estado = ?, elimina = ? WHERE id = ?";
        $array = [0, $fecha ,$id];
        return $this->save( $sql, $array);
    }
    
    //VER TOTAL ARCHIVOS COMPARTIDOS
    public function verificarEstado($correo)
    {
        $sql = "SELECT COUNT(id) AS total FROM detalle_archivos 
        WHERE correo = '$correo' AND estado = 1";
        return $this->select($sql);
    }

    
    public function getBusqueda($valor,$id_usuario)
    {
        $sql = "SELECT * FROM archivos WHERE nombre LIKE '%". $valor. "%' AND id_usuario = $id_usuario 
        AND estado = 1 LIMIT 10";
        return $this->selectAll($sql);
    }

    
}
?>