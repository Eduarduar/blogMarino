<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include ("db/Conexion.php");

class Contacto extends Conexion {
    public function log_in($usuario, $contra) {
        $this->sentencia = "SELECT * FROM usuarios WHERE user_name = '$usuario' AND contraseña = '$contra'";
        $bandera = $this->ejecutar_sentencia();
        return $bandera;
    }
    
    public function obtenerTituloPublicacion($idPost) {
        $this->sentencia = "SELECT title FROM publicaciones WHERE id = $idPost";
        $resultado = $this->obtener_sentencia();
        if ($fila = $resultado->fetch_assoc()) {
            return $fila['title'];
        } else {
            return null; // O manejar de otra manera si el título no se encuentra
        }
    }
    
    public function obtenerContenidoPublicacion($idPost) {
        $this->sentencia = "
        (SELECT 'texto' AS tipo, text AS contenido, position FROM texts WHERE idCodePost = $idPost)
        UNION ALL
        (SELECT 'imagen' AS tipo, location AS contenido, position FROM images WHERE idCodePost = $idPost)
        ORDER BY position ASC;
        ";
        return $this->obtener_sentencia();
    }
}
?>