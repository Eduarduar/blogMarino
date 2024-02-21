<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include ("./db/Conexion.php");

class Contacto extends Conexion {
    public function log_in($usuario, $contra) {
        $query = $this->connect()->query("SELECT eCodeUsuarios, tPasswordUsuarios FROM usuarios WHERE tUserNameUsuarios = '$usuario'");
        $query->execute();
        if ($query->rowCount()) {
            foreach ($query as $user) {
                $md5 = md5($contra);
                if (password_verify($md5, $user['tPasswordUsuarios'])) {
                    return $user['eCodeUsuarios'];
                }
            }
        }
        return false;
    }
}
?>