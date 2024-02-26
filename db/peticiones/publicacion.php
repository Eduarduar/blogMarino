<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include ("./db/Conexion.php");

class Contacto extends Conexion {
    public function obtenerTituloPublicacion($idPost) {
        $query = $this->connect()->query("SELECT p.tTitlePublicaciones, fCreationPublicaciones, fUpdatePublicaciones, u.tNameUsuarios, u.tLastNameUsuarios
        FROM publicaciones p
        INNER JOIN usuarios u ON p.eUserPublicaciones = u.eCodeUsuarios
        WHERE eCodePublicaciones = $idPost");
        $query->execute();

        if ($query->rowCount()) {
            foreach ($query as $titulo) {
                if ($titulo['fUpdatePublicaciones'] != null) {
                    $fecha = $titulo['fUpdatePublicaciones'];
                } else {
                    $fecha = $titulo['fCreationPublicaciones'];
                }
                $datos = [
                    'titulo' => $titulo['tTitlePublicaciones'],
                    'autor' => $titulo['tNameUsuarios'] . ' ' . $titulo['tLastNameUsuarios'],
                    'fecha' => $fecha
                ];
                return $datos;
            }
        } else {
            return null; // Or handle it differently if the title is not found
        }
    }

    public function obtenerTextoPublicacion($idPost) {
        $query = $this->connect()->query("SELECT t.tContenidoTexts, t.ePosicionTexts
        FROM publicaciones p
        INNER JOIN texts t ON p.eCodePublicaciones = t.ePublicacionTexts
        WHERE p.eCodePublicaciones = $idPost
        ORDER BY t.ePosicionTexts ASC;
        ");
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
    
    public function obtenerImagenPublicacion($idPost) {
        $query = $this->connect()->query("SELECT i.tLugarImages, i.ePosicionImages
        FROM publicaciones p
        INNER JOIN images i ON p.eCodePublicaciones = i.ePublicacionImages
        WHERE p.eCodePublicaciones = $idPost
        ORDER BY i.ePosicionImages ASC;
        ");
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

}
?>