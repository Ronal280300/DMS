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

}
?>