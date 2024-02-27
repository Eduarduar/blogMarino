<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include ("../db/Conexion.php");

class Contacto extends Conexion {

    public function getUserName($id){
        $query = $this->connect()->query("SELECT tUserNameUsuarios FROM usuarios WHERE eCodeUsuarios = $id");
        $query->execute();

        if ($query->rowCount()){
            foreach($query as $contenido){
                $datos = [
                    'nombre' => $contenido['tUserNameUsuarios']
                ];
            }
            return $datos;
        }
        return false;
    }

}