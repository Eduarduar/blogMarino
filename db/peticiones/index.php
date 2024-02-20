<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include ("./db/Conexion.php");

class Contacto extends Conexion {

    public function obtenerTituloUltimaPublicacion() {
        $this->sentencia = "SELECT title FROM publicaciones WHERE id = (SELECT MAX(id) FROM publicaciones)";
        $resultado = $this->obtener_sentencia();
        if ($fila = $resultado->fetch_assoc()) {
            return $fila['title'];
        } else {
            return null; // Or handle it differently if the title is not found
        }
    }

    public function obtenerContenidoUltimaPublicacion(){
        $this->sentencia = "
        (SELECT 'texto' AS tipo, text AS contenido, position FROM texts WHERE idCodePost = (SELECT MAX(id) FROM publicaciones))
        UNION ALL
        (SELECT 'imagen' AS tipo, location AS contenido, position FROM images WHERE idCodePost = (SELECT MAX(id) FROM publicaciones))
        ORDER BY position ASC;
        ";
        return $this->obtener_sentencia();
    }
}


?>