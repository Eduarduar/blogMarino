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

    public function obtenerImagenUltimaPublicacion() {
        $query = $this->connect()->query("SELECT i.tLugarImages, i.ePosicionImages 
                FROM publicaciones p
                INNER JOIN images i ON p.eCodePublicaciones = i.ePublicacionImages
                WHERE p.eCodePublicaciones = (SELECT MAX(eCodePublicaciones) FROM publicaciones)");
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

    // public function obtenerTituloUltimaPublicacion() {
    //     $query = $this->connect()->query("SELECT title FROM publicaciones WHERE id = (SELECT MAX(id) FROM publicaciones)");
    //     $query->execute();

    //     if ($query->rowCount()) {
    //         foreach ($query as $titulo) {
    //             $datos = $titulo['title'];
    //             return $datos;
    //         }
    //     } else {
    //         return null; // Or handle it differently if the title is not found
    //     }
    // }

    // public function obtenerContenidoUltimaPublicacion(){
    //     $query = $this->connect()->query("SELECT content FROM publicaciones WHERE id = (SELECT MAX(id) FROM publicaciones)");
    //     $query->execute();

    //     if ($query->rowCount()) {
    //         foreach ($query as $contenido) {
    //             $datos = $contenido['content'];
    //             return $datos;
    //         }
    //     } else {
    //         return null; // Or handle it differently if the content is not found
    //     }
    // }

    // public function obtenerVistas() { // se obtendran las ultimas 5 publicaciones
    //     $query = $this->connect()->query("SELECT title, content FROM publicaciones ORDER BY id DESC LIMIT 5");
    //     $query->execute();

    //     if ($query->rowCount()) {
    //         foreach ($query as $publicacion) {
    //             $datos = [
    //                 'title' => $publicacion['title'],
    //                 'content' => $publicacion['content']
    //             ];
    //         }
    //         return $datos;
    //     } else {
    //         return null; // Or handle it differently if the content is not found
    //     }
    // }
}


?>