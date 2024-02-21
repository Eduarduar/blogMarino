<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include ("./db/Conexion.php");

class Contacto extends Conexion {
    public function obtenerTituloPublicacion($idPost) {
        $query = $this->connect()->query("SELECT tTitlePublicaciones FROM publicaciones WHERE eCodePublicaciones = $idPost");
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

    public function obtenerTextoPublicacion($idPost) {
        $query = $this->connect()->query("SELECT t.tContenidoTexts, t.ePosicionTexts FROM publicaciones p
        INNER JOIN texts t ON p.eCodePublicaciones = t.eCodeTexts
        WHERE p.eCodePublicaciones = $idPost");
        $query->execute();

        if ($query->rowCount()) {
            foreach ($query as $contenido) {
                $datos = [
                    'text' => [
                        'text' => $contenido['tContenidoTexts'],
                        'positionText' => $contenido['ePosicionTexts']
                    ]
                ];
            }
            return $datos;
        } else {
            return false; // Or handle it differently if the content is not found
        }
    }
    
    public function obtenerImagenPublicacion($idPost) {
        $query = $this->connect()->query("SELECT i.tLugarImages, i.ePosicionImages FROM publicaciones p
        INNER JOIN images i ON p.eCodePublicaciones = i.eCodeImages
        WHERE p.eCodePublicaciones = $idPost");
        $query->execute();

        if ($query->rowCount()) {
            foreach ($query as $contenido) {
                $datos = [
                    'imagen' => [
                        'imagen' => $contenido['tLugarImages'],
                        'positionImagen' => $contenido['ePosicionImages']
                    ]
                ];
            }
            return $datos;
        } else {
            return false; // Or handle it differently if the content is not found
        }
    }

}
?>