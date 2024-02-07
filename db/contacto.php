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
}
?>