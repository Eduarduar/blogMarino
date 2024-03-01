<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include ("./db/conexion.php");

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
}

?>