<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include ("../conexion.php");

class Contacto extends Conexion {

    public function getNameUser($email){
        $query = $this->connect()->prepare("SELECT tNameUsuarios FROM usuarios WHERE tMailUsuarios = :email");
        $query->execute(['email' => $email]);

        if ($query->rowCount()) {
            foreach ($query as $name) {
                return $name['tNameUsuarios'];
            }
        } else {
            return false;
        }
    }

    public function getIdUser($email){
        $query = $this->connect()->prepare("SELECT eCodeUsuarios FROM usuarios WHERE tMailUsuarios = :email");
        $query->execute(['email' => $email]);

        if ($query->rowCount()) {
            foreach ($query as $id) {
                return $id['eCodeUsuarios'];
            }
        } else {
            return false;
        }
    }

    public function confirmEmail($email) {
        $query = $this->connect()->prepare("SELECT tMailUsuarios 
        FROM usuarios 
        WHERE tMailUsuarios = :email
        ");
        $query->execute(['email' => $email]);
        
        if ($query->rowCount()) {
            return true;
        } else {
            return false;
        }
    }
    public function setCode($id, $code) {
        $query = $this->connect()->prepare("INSERT INTO codes VALUES (NULL , :code, :id)");
        $query->execute(['code' => $code, 'id' => $id]);

        if ($query->rowCount()) {
            return true;
        } else {
            return false;
        }
    }

}



if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    session_start();
    $contacto = new Contacto();

    $resp;

    if (isset($_POST['action'])){
        switch ($_POST['action']) {
            case 'setCode':
                if ($contacto->confirmEmail($_POST['email'])){
                    $code = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 100);
                    if ($contacto->setCode($contacto->getIdUser($_POST['email']) , $code)){
                        $resp = array('code' => '0', 'message' => "We have sent you a recovery email");
                        $nombreDeUsuario = $contacto->getNameUser($_POST['email']); // aqui tienes el nombre por si lo ocupas
                        $correoDelUsuario = $_POST['email']; // aqui tienes el correo por si lo ocupas

                        // aqui inserta tu codigo para enviar el correo
                        include("sendmail.php");

                    } else {
                        $resp = array('code' => '1', 'message' => "An error has occurred, try again later");
                    }
                } else {
                    $resp = array('code' => '1', 'message' => "The email is not registered");
                }
                break;
            break;
        }
        echo json_encode($resp);
    }
}

?>
