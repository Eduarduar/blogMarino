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

    public function confirmCode($code) {
        $query = $this->connect()->prepare("SELECT c.tCodeCodes
        FROM codes c
        INNER JOIN usuarios u
        ON c.eUserCodes = u.eCodeUsuarios
        WHERE c.tCodeCodes = :code
        ");
        $query->execute(['code' => $code]);

        if ($query->rowCount()) {
            return true;
        } else {
            return false;
        }
    }

    public function updatePassword($password) {
        $query = $this->connect()->prepare("UPDATE usuarios SET tPasswordUsuarios = :password WHERE eCodeUsuarios = 1");
        $query->execute(['password' => $password]);

        if ($query->rowCount()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteCode($code) {
        $query = $this->connect()->prepare("DELETE FROM codes WHERE tCodeCodes = :code");
        $query->execute(['code' => $code]);

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
            case 'confirmCode':
                if ($contacto->confirmCode($_POST['code'])){
                    $resp = array('code' => '0', 'message' => "Code confirmed", 'data' => true);
                } else {
                    $resp = array('code' => '0', 'message' => "The code is incorrect", 'data' => false);
                }
                break;
            case 'changePassword':
                $pass = preg_replace('/[^a-zA-Z0-9\s]/', '', $_POST['password']);
                $md5 = md5($pass);
                $hash = password_hash($md5, PASSWORD_DEFAULT, ['cost' => 10]);
                if ($contacto->updatePassword($hash)){
                    $contacto->deleteCode($_POST['code']);
                    $resp = array('code' => '0', 'message' => "Password updated successfully");
                } else {
                    $resp = array('code' => '1', 'message' => "An error has occurred, try again later");
                }
                break;
        }
        echo json_encode($resp);
    }
}

?>
