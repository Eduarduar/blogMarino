<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include ("./db/Conexion.php");

class Contacto extends Conexion {

    public function obtenerTituloUltimaPublicacion() {
        $query = $this->connect()->query("SELECT tTitlePublicaciones 
        FROM publicaciones 
        WHERE eCodePublicaciones = (SELECT MAX(eCodePublicaciones) FROM publicaciones)");
        $query->execute();

        if ($query->rowCount()) {
            foreach ($query as $titulo) {
                $datos = $titulo['tTitlePublicaciones'];
                return $datos;
            }
        } else {
            return null; // Or handle it differently if the title is not found
        }
    }

    public function obtenerTextoUltimaPublicacion() {
        $query = $this->connect()->query("SELECT t.tContenidoTexts, t.ePosicionTexts 
                FROM publicaciones p
                INNER JOIN texts t ON p.eCodePublicaciones = t.epublicacionTexts
                WHERE p.eCodePublicaciones = (SELECT MAX(eCodePublicaciones) FROM publicaciones)");
        $query->execute();
    
        if ($query->rowCount()) {
            $count = 1;
            foreach ($query as $contenido) {
                $datos['text' . $count] = [
                    'text' => $contenido['tContenidoTexts'],
                    'positionText' => $contenido['ePosicionTexts']
                ];
                $count++;
            }
            return $datos;
        } else {
            return false; // Or handle it differently if the content is not found
        }
    }

    public function obtenerImagenUltimaPublicacion() {
        $query = $this->connect()->query("SELECT i.tLugarImages, i.ePosicionImages 
                FROM publicaciones p
                INNER JOIN images i ON p.eCodePublicaciones = i.ePublicacionImages
                WHERE p.eCodePublicaciones = (SELECT MAX(eCodePublicaciones) FROM publicaciones)");
        $query->execute();

        if ($query->rowCount()) {
            $count = 1;
            foreach ($query as $contenido) {
                $datos['imagen' . $count] = [
                    'imagen' => $contenido['tLugarImages'],
                    'positionImagen' => $contenido['ePosicionImages']
                ];
                $count++;
            }
            return $datos;
        } else {
            return false; // Or handle it differently if the content is not found
        }
    }

    public function obtenerUltimasPublicaciones(){
        $query = $this->connect()->query("SELECT p.eCodePublicaciones, p.tTitlePublicaciones, t.tContenidoTexts
        FROM publicaciones p
        INNER JOIN texts t ON t.ePublicacionTexts = p.eCodePublicaciones
        WHERE t.ePosicionTexts = 1
        ORDER BY p.eCodePublicaciones DESC
        LIMIT 5 OFFSET 1;
        ");
        $query->execute();

        if ($query->rowCount()) {
            $count = 1;
            foreach ($query as $contenido) {
                $datos['publicacion' . $count] = [
                    'eCodePublicaciones' => $contenido['eCodePublicaciones'],
                    'tTitlePublicaciones' => $contenido['tTitlePublicaciones'],
                    'tContenidoTexts' => $contenido['tContenidoTexts']
                ];
                $count++;
            }
            return $datos;
        } else {
            return false; // Or handle it differently if the content is not found
        }
    }

}


?>