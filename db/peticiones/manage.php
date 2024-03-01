<?php
error_reporting(E_ALL);
date_default_timezone_set("America/Mexico_City");
ini_set('display_errors', 1); // Mostrar errores

if (file_exists("../db/conexion.php")) {
    include("../db/conexion.php");
}else {
    include("../conexion.php");
}

class Contacto extends Conexion {

    public function getUserName($id){
        $query = $this->connect()->query("SELECT tUserNameUsuarios FROM usuarios WHERE eCodeUsuarios = $id");
        $query->execute();

        if ($query->rowCount()){
            foreach($query as $contenido){
                $datos = [
                    'nombre' => $contenido['tUserNameUsuarios']
                ];
            }
            return $datos;
        }
        return false;
    }

    public function getCategories() {
        $query = $this->connect()->query("SELECT * FROM categorias");
        $query->execute();

        if ($query->rowCount()){
            $count = 0;
            foreach($query as $contenido){
                $datos['category'. $count] = [
                    'id' => $contenido['eCodeCategorias'],
                    'nombre' => $contenido['tNameCategorias']
                ];
                $count++;
            }
            return $datos;
        }
        return false;
    }

    public function getIdLastPost() {
        $query = $this->connect()->query("SELECT eCodePublicaciones FROM publicaciones ORDER BY eCodePublicaciones DESC LIMIT 1");
        $query->execute();

        if ($query->rowCount()){
            foreach($query as $contenido){ 
                return $contenido['eCodePublicaciones'];
            }
        }
        return false;
    }

    public function addPost($title, $category, $idUser) {
        $query = $this->connect()->prepare("INSERT INTO publicaciones (eUserPublicaciones, tTitlePublicaciones, fCreationPublicaciones, eCategoriaPublicaciones) VALUES (:idUser, :title, CURRENT_TIMESTAMP, :category)");
        $query->execute(['idUser' => $idUser, 'title' => $title, 'category' => $category]);

        return $this->getIdLastPost();
    }

    public function setImage($idPost, $position, $imagen)
    {
        $query = $this->connect()->prepare("INSERT INTO images (tLugarimages, ePosicionImages, ePublicacionImages) VALUES (:imagen, :position, :idPost)");
        $query->execute(['imagen' => $imagen, 'position' => $position, 'idPost' => $idPost]);

        return true;
    }

    public function setText($idPost, $position, $texto)
    {
        $query = $this->connect()->prepare("INSERT INTO texts (tContenidoTexts, ePosicionTexts, epublicacionTexts) VALUES (:texto, :position, :idPost)");
        $query->execute(['texto' => $texto, 'position' => $position, 'idPost' => $idPost]);

        return true;
    }

    public function getPosts(){
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
                    'id'            =>  $contenido['eCodePublicaciones'],
                    'title'        =>  $contenido['tTitlePublicaciones'],
                    'content'     =>  $contenido['tContenidoTexts']
                ];
                $count++;
            }
            return $datos;
        } else {
            return false;
        }
    }
    
}

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $contacto = new Contacto();
    session_start();

    if (isset($_POST['title']) && isset($_POST['category']) && isset($_POST['modules']) && isset($_SESSION['idUser'])){
        $title = $_POST['title'];
        $category = $_POST['category'];
        $idUser = $_SESSION['idUser'];
        $modulos = json_decode($_POST['modules'], true);
    
        $idPost = $contacto->addPost($title, $category, $idUser);
        
        foreach ($modulos as $modulo) {
            if ($modulo['type'] == 'image') {
                $modulo['content'] = substr($modulo['content'], 1);
                $contacto->setImage($idPost, $modulo['position'] + 1, $modulo['content']);
            } else {
                $contacto->setText($idPost, $modulo['position'] + 1, $modulo['content']);
            }
        }
    
        $resp = array('code' => '0', 'message' => 'Se insertó la publicación correctamente');
    
        echo json_encode($resp);
        exit;
    }

    if (isset($_FILES['file']) && isset($_POST['fileName'])) { // fileName contiene la ruta completa donde almacenar la imagen
        $file = $_FILES['file'];
        $fileName = $_POST['fileName'];
        $fileTmpName = $file['tmp_name'];
        $fileError = $file['error'];
        $fileSize = $file['size'];
        $fileExt = explode('.', $file['name']);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('jpg', 'jpeg', 'png', 'gif');

        // $fileName tiene la ruta completa donde almacenar la imagen junto con el nombre
        $newName = explode('/', $fileName); // Separar la ruta del nombre
        $newName = end($newName); // Obtener el nombre del archivo
        $fileDestination = '../../source/public/img/' . $newName; // Ruta donde se almacenará la imagen

        

        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 10000000) { // 10MB son 10000000 bytes
                    if (move_uploaded_file($fileTmpName, $fileDestination)) {
                        $resp = array('code' => '0', 'message' => 'Se subió la imagen correctamente');
                        echo json_encode($resp);
                        exit;
                    } else {
                        $resp = array('code' => '1', 'message' => 'No se pudo subir la imagen');
                        echo json_encode($resp);
                        exit;
                    }
                } else {
                    $resp = array('code' => '1', 'message' => 'La imagen es muy grande');
                    echo json_encode($resp);
                    exit;
                }
            } else {
                $resp = array('code' => '1', 'message' => 'Ocurrió un error al subir la imagen');
                echo json_encode($resp);
                exit;
            }
        } else {
            $resp = array('code' => '1', 'message' => 'No se puede subir archivos de este tipo');
            echo json_encode($resp);
            exit;
        }

    }
}
