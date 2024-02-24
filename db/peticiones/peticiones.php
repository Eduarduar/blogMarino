<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include ("../Conexion.php");

class Contacto extends Conexion {

    public function busqueda($titulo){
        $query = $this->connect()->query("SELECT p.eCodePublicaciones, p.tTitlePublicaciones, t.tContenidoTexts
        FROM publicaciones p
        INNER JOIN texts t On t.ePublicacionTexts = p.eCodePublicaciones
        WHERE t.ePosicionTexts = 1 AND p.tTitlePublicaciones = '$titulo'
        ORDER BY p.eCodePublicaciones DESC;
        ");
        $query->execute();

        if ($query->rowCount()){
            $count = 1;
            foreach ($query as $contenido) {
                $datos['publicacion' . $count] = [
                    'eCodePublicaciones'        =>  $contenido['eCodePublicaciones'],
                    'tTitlePublicaciones'       =>  $contenido['tTitlePublicaciones'],
                    'tContenidoTexts'   =>  $contenido['tContenidoTexts']
                ];
                $count++;
            }
            return $datos;
        } else {
            return false;
        }

    }

}

$contacto = new Contacto();

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    if (isset($_POST['busqueda'])){
        $busqueda = $_POST['busqueda'];
        $datos = $contacto->busqueda($busqueda);
        echo json_encode($datos);
    }
}

?>