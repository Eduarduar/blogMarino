<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include ("../conexion.php");

class Contacto extends Conexion {
    public function log_in($usuario, $contra) {
        $usuario = preg_replace('/[^a-zA-Z0-9\s]/', '', $usuario);
        $contra = preg_replace('/[^a-zA-Z0-9\s]/', '', $contra);
        
        $query = $this->connect()->query("SELECT eCodeUsuarios, tPasswordUsuarios FROM usuarios WHERE tUserNameUsuarios = '$usuario'");
        $query->execute();
        if ($query->rowCount()) {
            foreach ($query as $user) {
                $md5 = md5($contra);
                if (password_verify($md5, $user['tPasswordUsuarios'])) {
                    return array('code' => '0', 'message' => 'You have successfully logged in', 'datos' => $user['eCodeUsuarios']);
                }
            }
        }
        return array('code' => '1', 'message' => 'Incorrect username or password');
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    session_start();
    $contacto = new Contacto();

    if (isset($_POST['user']) && isset($_POST['pass'])) {
        $usuario = $_POST['user'];
        $contra = $_POST['pass'];
        $resp = $contacto->log_in($usuario, $contra);
        // comprobamos si existe dentro del array la clave 'datos'
        if (array_key_exists('datos', $resp)) { // si existe, la eliminamos
            $_SESSION['idUser'] = $resp['datos'];
            unset($resp['datos']);
        }
        echo json_encode($resp);
    }
}

?>

