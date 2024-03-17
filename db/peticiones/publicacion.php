<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include ("./db/conexion.php");

class Contacto extends Conexion {

    public function obtenerTituloUltimaPublicacion() {
        $query = $this->connect()->query("SELECT p.tTitlePublicaciones, p.fCreationPublicaciones, p.fUpdatePublicaciones, u.tNameUsuarios, u.tLastNameUsuarios
        FROM publicaciones p
        INNER JOIN usuarios u ON p.eUserPublicaciones = u.eCodeUsuarios
        INNER JOIN categorias c ON p.eCategoriaPublicaciones = c.eCodeCategorias
        WHERE eCodePublicaciones = (SELECT MAX(eCodePublicaciones) FROM publicaciones p INNER JOIN categorias c ON p.eCategoriaPublicaciones = c.eCodeCategorias WHERE c.bStatusCategorias = 1 AND p.bStatusPublicaciones = 1)
        AND c.bStatusCategorias = 1 AND p.bStatusPublicaciones = 1
        ");
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

    public function obtenerTextoUltimaPublicacion() {
        $query = $this->connect()->query("SELECT t.tContenidoTexts, t.ePosicionTexts 
                FROM publicaciones p
                INNER JOIN texts t ON p.eCodePublicaciones = t.epublicacionTexts
                WHERE p.eCodePublicaciones = (SELECT MAX(eCodePublicaciones) FROM publicaciones p INNER JOIN categorias c ON p.eCategoriaPublicaciones = c.eCodeCategorias WHERE c.bStatusCategorias = 1 AND p.bStatusPublicaciones = 1)
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

    public function obtenerImagenUltimaPublicacion() {
        $query = $this->connect()->query("SELECT i.tLugarImages, i.ePosicionImages 
                FROM publicaciones p
                INNER JOIN images i ON p.eCodePublicaciones = i.ePublicacionImages
                WHERE p.eCodePublicaciones = (SELECT MAX(eCodePublicaciones) FROM publicaciones p INNER JOIN categorias c ON p.eCategoriaPublicaciones = c.eCodeCategorias WHERE c.bStatusCategorias = 1 AND p.bStatusPublicaciones = 1)");
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
        INNER JOIN categorias c ON p.eCategoriaPublicaciones = c.eCodeCategorias
        WHERE t.ePosicionTexts = 1
        AND p.bStatusPublicaciones = 1
        AND c.bStatusCategorias = 1
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