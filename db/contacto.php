<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include ("db/Conexion.php");

class Contacto extends Conexion {
    public function log_in($usuario, $contra) {
        $this->sentencia = "SELECT * FROM usuarios WHERE userName = '$usuario'";
        $bandera = $this->ejecutar_sentencia();

        if ($bandera->num_rows > 0) {
            $usuarioEncontrado = $bandera->fetch_assoc();
            $hashContra = $usuarioEncontrado['password'];
            if ($contra == $hashContra) { 
                // password_verify($contra, $hashContra
                // La contraseña es correcta, el usuario puede iniciar sesión
                return true;
            }
        }

        return false;
        
    }
}
?>