<?php

class CompartidosModel extends Query {
    public function __construct()
     {
        parent::__construct();
    }

    public function getArchivosCompartidos($correo)
    {
        $sql = "SELECT d.id, d.correo, a.nombre AS archivo, u.nombre FROM detalle_archivos d INNER JOIN archivos a ON d.id_archivo = a.id INNER JOIN usuarios u ON d.id_usuario = u.id WHERE d.correo = '$correo'";
        return $this->selectAll( $sql );
    }

    public function getDetalle($id_detalle)
    {
        $sql = "SELECT d.id, d.fecha_add, d.correo, a.nombre, a.id_carpeta FROM detalle_archivos d INNER JOIN archivos a ON d.id_archivo = a.id INNER JOIN carpetas c ON a.id_carpeta = c .id WHERE d.id = $id_detalle";
        return $this->select( $sql );
    }


}
?>