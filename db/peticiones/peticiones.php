<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include ("../Conexion.php");

class Contacto extends Conexion {
    
    public function obtenerTodasLasPublicaciones() {
        $query = $this->connect()->query("SELECT p.eCodePublicaciones, p.tTitlePublicaciones, t.tContenidoTexts
        FROM publicaciones p
        INNER JOIN texts t On t.ePublicacionTexts = p.eCodePublicaciones
        WHERE t.ePosicionTexts = 1
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

    public function busqueda($titulo){
        $query = $this->connect()->query("SELECT p.eCodePublicaciones, p.tTitlePublicaciones, t.tContenidoTexts
        FROM publicaciones p
        INNER JOIN texts t On t.ePublicacionTexts = p.eCodePublicaciones
        WHERE t.ePosicionTexts = 1 AND p.tTitlePublicaciones LIKE '%$titulo%'
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
        $resp;
        $busqueda = filter_input(INPUT_POST, 'busqueda', FILTER_DEFAULT);
        $busqueda = preg_replace('/[^a-zA-Z0-9\s]/', '', $busqueda); // Remove special characters
        $comprobar = trim($busqueda); // Check if the variable is empty
        if ($comprobar == ''){
            $datos = $contacto->obtenerTodasLasPublicaciones();
            $resp = array('code' => '0', 'message' => 'Entrada vacia.', 'datos' => $datos);
        } else {
            $datos = $contacto->busqueda($busqueda);
            if ($datos == false){
                $resp = array('code' => '1', 'message' => 'No se encontraron resultados.');
            } else {
                $resp = array('code' => '2', 'message' => 'Publicaciones encontradas.', 'datos' => $datos);
            }
        }
        echo json_encode($resp);
    }
}

?>
