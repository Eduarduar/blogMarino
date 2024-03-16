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
        $query = $this->connect()->query("SELECT c.eCodeCategorias, c.tNameCategorias, c.bStatusCategorias
        FROM categorias c
        ");
        $query->execute();

        if ($query->rowCount()){
            $count = 0;
            foreach($query as $contenido){
                $datos['category'. $count] = [
                    'id' => $contenido['eCodeCategorias'],
                    'nombre' => $contenido['tNameCategorias'],
                    'estado' => $contenido['bStatusCategorias']
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
        $query = $this->connect()->prepare("INSERT INTO publicaciones (eUserPublicaciones, tTitlePublicaciones, fCreationPublicaciones, eCategoriaPublicaciones, bStatusPublicaciones) VALUES (:idUser, :title, CURRENT_TIMESTAMP, :category, 1)");
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
        $query = $this->connect()->query("SELECT p.eCodePublicaciones, p.tTitlePublicaciones, t.tContenidoTexts, p.bStatusPublicaciones, c.tNameCategorias, c.bStatusCategorias
        FROM publicaciones p
        INNER JOIN texts t On t.ePublicacionTexts = p.eCodePublicaciones
        INNER JOIN categorias c ON p.eCategoriaPublicaciones = c.eCodeCategorias
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
                    'content'     =>  $contenido['tContenidoTexts'],
                    'status'      =>  $contenido['bStatusPublicaciones'],
                    'category'    =>  $contenido['tNameCategorias'],
                    'statusCategory' => $contenido['bStatusCategorias']
                ];
                $count++;
            }
            return $datos;
        } else {
            return false;
        }
    }

    public function getInfoUser($id) {
        $query = $this->connect()->query("SELECT u.tNameUsuarios, u.tLastNameUsuarios, u.tUserNameUsuarios, u.tMailUsuarios
        FROM usuarios u 
        WHERE eCodeUsuarios = $id;
        ");
        $query->execute();

        if ($query->rowCount()){
            foreach ($query as $contenido) {
                $datos = [
                    'name'      =>  $contenido['tNameUsuarios'],
                    'lastName'  =>  $contenido['tLastNameUsuarios'],
                    'userName'  =>  $contenido['tUserNameUsuarios'],
                    'email'     =>  $contenido['tMailUsuarios']
                ];
            }
            return $datos;
        } else {
            return false;
        }
    }

    public function getCountPosts() {
        $query = $this->connect()->query("SELECT COUNT(eCodePublicaciones) as total FROM publicaciones");
        $query->execute();

        if ($query->rowCount()){
            foreach ($query as $contenido) {
                $count = $contenido['total'];
            }
            return $count;
        } else {
            return false;
        }
    }

    public function getCountCategories() {
        $query = $this->connect()->query("SELECT COUNT(eCodeCategorias) as total FROM categorias");
        $query->execute();

        if ($query->rowCount()){
            foreach ($query as $contenido) {
                $count = $contenido['total'];
            }
            return $count;
        } else {
            return false;
        }
    }

    public function getCountVisits() {
        $query = $this->connect()->query("SELECT tContentConfig FROM config WHERE eCodeConfig = 1 AND tNameConfig = 'visits'");
        $query->execute();

        if ($query->rowCount()){
            foreach ($query as $contenido) {
                $count = $contenido['tContentConfig'];
                // convertimos el valor a entero
                $count = (int)$count;
            }
            return $count;
        } else {
            return false;
        }
    }

    public function updateCountVisits($count) {
        $query = $this->connect()->query("UPDATE config SET tContentConfig = '$count' WHERE eCodeConfig = 1 AND tNameConfig = 'visits'");
        $query->execute();

        return true;
    }

    public function validDataUser($userName, $email, $id) {
        $query = $this->connect()->query("SELECT tUserNameUsuarios, tMailUsuarios 
        FROM usuarios 
        WHERE (tUserNameUsuarios = '$userName' OR tMailUsuarios = '$email') AND eCodeUsuarios <> $id;");
        $query->execute();

        if ($query->rowCount()){
            foreach ($query as $contenido) {
                if ($contenido['tUserNameUsuarios'] == $userName) {
                    return ['code' => '1', 'message' => 'User name already exist'];
                } if ($contenido['tMailUsuarios'] == $email) {
                    return ['code' => '1', 'message' => 'Email already exist'];
                }
            }
        } else {
            return ['code' => '0', 'message' => 'The user does not repeat himself'];
        }

    }
    
    public function updateInfoUser($name, $lastName, $userName, $email){
        $name = preg_replace('/[^a-zA-Z0-9\s]/', '', $name);
        $lastName = preg_replace('/[^a-zA-Z0-9\s]/', '', $lastName);
        $userName = preg_replace('/[^a-zA-Z0-9\s]/', '', $userName);
        $email = preg_replace('/[^a-zA-Z0-9\s@\.]/', '', $email);
        $id = $_SESSION['idUser'];
        $validDataUser = $this->validDataUser($userName, $email, $id);
        if ($validDataUser['code'] == '1') {
            return $validDataUser;
        } else {
            $query = $this->connect()->query("UPDATE usuarios 
                SET tNameUsuarios = '$name', tLastNameUsuarios = '$lastName', tUserNameUsuarios = '$userName', tMailUsuarios = '$email' 
                WHERE eCodeUsuarios = $id; 
            ");
            $query->execute();
    
            return ['code' => '0', 'message' => 'Information was updated correctly'];
        }
    }

    public function confirmPass($pass, $id) {
        $query = $this->connect()->query("SELECT tPasswordUsuarios FROM usuarios WHERE eCodeUsuarios = $id;");
        $query->execute();
        if ($query->rowCount()) {
            foreach ($query as $passU) {
                $md5 = md5($pass);
                if (password_verify($md5, $passU['tPasswordUsuarios'])) {
                    return array('code' => '0', 'message' => 'Correct password');
                }
            }
        }
        return array('code' => '1', 'message' => 'Incorrect password1');
    }

    public function updatePass($nPass, $cPass, $id) {
        $nPass = preg_replace('/[^a-zA-Z0-9]/', '', $nPass);
        $cPass = preg_replace('/[^a-zA-Z0-9]/', '', $cPass);
        $validcPass = $this->confirmPass($cPass, $id);
        $validnPass = $this->confirmPass($nPass, $id);
        if ($validcPass['code'] == '1'){
            return $validcPass;
        }if ($validnPass['code'] != '0'){
            $md5 = md5($nPass);
            $passHash = password_hash($md5, PASSWORD_DEFAULT, ['cost' => 10]);
            $query = $this->connect()->query("UPDATE usuarios 
                SET tPasswordUsuarios = '$passHash' 
                WHERE eCodeUsuarios = $id; 
            ");
            $query->execute();
    
            return ['code' => '0', 'message' => 'Password updated successfully'];
        }else{
            return ['code' => '1', 'message' => 'The new password must be different from the current one'];
        }
    }

    public function getIdLastCategory() {
        $query = $this->connect()->query("SELECT eCodeCategorias FROM categorias ORDER BY eCodeCategorias DESC LIMIT 1");
        $query->execute();

        if ($query->rowCount()){
            foreach($query as $contenido){
                return $contenido['eCodeCategorias'];
            }
        }
        return false;
    }

    public function getCategory($id) {
        $query = $this->connect()->query("SELECT c.tNameCategorias, c.bStatusCategorias FROM categorias c WHERE c.eCodeCategorias = $id;");
        $query->execute();

        if ($query->rowCount()){
            foreach ($query as $contenido) {
                $datos = [
                    'id' => $id,
                    'nombre' => $contenido['tNameCategorias'],
                    'estado' => $contenido['bStatusCategorias']
                ];
            }
            return $datos;
        } else {
            return false;
        }
    }

    public function addCategory($categoria){
        $query = $this->connect()->prepare("INSERT INTO categorias (tNameCategorias, bStatusCategorias) VALUES (:categoria, 1)");
        $query->execute(['categoria' => $categoria]);

        // Obtenemos el id de la última categoría insertada
        $id = $this->getIdLastCategory();
        // validamos que no sea un valor falso
        if ($id == false){
            return ['code' => '2', 'message' => 'To see the category reload the page'];
        }
        // obtenemos la categoría que acabamos de insertar
        $categoria = $this->getCategory($id);
        // validamos que no sea un valor falso
        if ($categoria == false){
            return ['code' => '2', 'message' => 'To see the category reload the page'];
        }
        return ['code' => '0', 'message' => 'The category was inserted correctly', 'datos' => $categoria];
    }

    public function validCategory($categoria){
        $query = $this->connect()->query("SELECT tNameCategorias FROM categorias WHERE tNameCategorias = '$categoria'");
        $query->execute();

        if ($query->rowCount()){
            return ['code' => '1', 'message' => 'The category already exists'];
        } else {
            return ['code' => '0'];
        }
    }

    public function getPostsForCategory($id){
        $query = $this->connect()->query("SELECT p.eCodePublicaciones
        FROM publicaciones p
        INNER JOIN categorias c ON p.eCategoriaPublicaciones = c.eCodeCategorias
        WHERE p.eCategoriaPublicaciones = $id
        ");
        $query->execute();

        if ($query->rowCount()){
            $count = 1;

            foreach ($query as $contenido) {
                $datos['publicacion' . $count] = [
                    'id' =>  $contenido['eCodePublicaciones']
                ];
                $count++;
            }
            return $datos;
        } else {
            return false;
        }
    }

    public function deleteCategory($id){
        // obtemos las publicaciones de la categoría
        $posts = $this->getPostsForCategory($id);
        // validamos que no sea un valor falso
        if ($posts != false){
            // si no es falso, recorremos las publicaciones y las eliminamos
            foreach ($posts as $post) {
                $this->deletePost($post['id']);
            }
        }

        // eliminamos la categoría
        $query = $this->connect()->query("DELETE FROM categorias WHERE eCodeCategorias = $id");
        $query->execute();

        return ['code' => '0', 'message' => 'Category was successfully deleted'];
    }

    public function updateStatusCategory($id, $estado){
        $query = $this->connect()->query("UPDATE categorias SET bStatusCategorias = $estado WHERE eCodeCategorias = $id");
        $query->execute();

        return ['code' => '0', 'message' => 'The category status was updated successfully'];
    }

    public function updateNameCategory($id, $nombre){
        $nombre = preg_replace('/[^a-zA-Z0-9\s]/', '', $nombre);
        $query = $this->connect()->prepare("UPDATE categorias SET tNameCategorias = :nombre WHERE eCodeCategorias = :id");
        $query->execute(['nombre' => $nombre, 'id' => $id]);

        return ['code' => '0', 'message' => 'The category name was updated successfully'];
    }

    
    public function getTextsPost($idPost) {
        $query = $this->connect()->query("SELECT t.eCodeTexts
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
                    'id' => $contenido['eCodeTexts']
                ];
                $count++;
            }
            return $datos;
        } else {
            return false; // Or handle it differently if the content is not found
        }
    }
    
    public function getImagesPost($idPost) {
        $query = $this->connect()->query("SELECT i.eCodeImages, i.tLugarImages
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
                    'id' => $contenido['eCodeImages'],
                    'path' => $contenido['tLugarImages']
                ];
                $count++;
            }
            return $datos;
        } else {
            return false; // Or handle it differently if the content is not found
        }
    }

    public function deletePost($id){
        // eliminamos los textos
        $this->deleteText($id);

        $images = $this->getImagesPost($id);
        // validamos que no sea un valor falso
        if ($images != false){
            // si no es falso, recorremos las imágenes y las eliminamos
            foreach ($images as $image) {
                $this->deleteImage($image['id'], $image['path']);
            }
        }
        // eliminamos la publicación
        $query = $this->connect()->query("DELETE FROM publicaciones WHERE eCodePublicaciones = $id");
        $query->execute();

        return ['code' => '0', 'message' => 'The post was successfully deleted'];
    }

    public function deleteText($id){
        $query = $this->connect()->query("DELETE FROM texts WHERE epublicacionTexts = $id");
        $query->execute();

        return ['code' => '0', 'message' => 'The text was successfully deleted'];
    }

    public function deleteImage($id, $path){
        $query = $this->connect()->query("DELETE FROM images WHERE eCodeImages = $id");
        $query->execute();

        $folderImages = '../../source/public/img/';
        // obtemos el nombre de la imagen junto con su extensión
        $name = explode('/', $path);
        $name = end($name); // end() obtiene el último valor de un array
        // eliminamos la imagen
        if (file_exists($folderImages . $name)) {
            unlink($folderImages . $name);
        }

        return ['code' => '0', 'message' => 'The image was successfully deleted'];
    }

    public function updateStatusPost($id, $estado){
        $query = $this->connect()->query("UPDATE publicaciones SET bStatusPublicaciones = $estado WHERE eCodePublicaciones = $id");
        $query->execute();

        return ['code' => '0', 'message' => 'The post status was updated successfully'];
    }

}

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $contacto = new Contacto();
    session_start();

    if (isset($_POST['action'])){
        $action = $_POST['action'];
        switch ($action) {
            case 'getCountPosts':
                    $countPosts = $contacto->getCountPosts();
                    if ($countPosts == false){
                        echo json_encode(['code' => '1', 'message' => 'No posts available']);
                    } else {
                        echo json_encode(['code' => '0', 'message' => 'Posts available', 'datos' => $countPosts]);
                    }
                    break;
            case 'getCountCategories':
                $countCategories = $contacto->getCountCategories();
                if ($countCategories == false){
                    echo json_encode(['code' => '1', 'message' => 'No categories available']);
                } else {
                    echo json_encode(['code' => '0', 'message' => 'Categories available', 'datos' => $countCategories]);
                }
                break;
            case 'getCountVisits':
                $countVisits = $contacto->getCountVisits();
                if ($countVisits == false){
                    echo json_encode(['code' => '1', 'message' => 'No visits available']);
                } else {
                    echo json_encode(['code' => '0', 'message' => 'Visits available', 'datos' => $countVisits]);
                }
                break;
            case 'updateCountVisits':
                $count = $contacto->getCountVisits();
                $count++;
                $updateCountVisits = $contacto->updateCountVisits($count);
                echo json_encode($updateCountVisits);
                break;
            case 'getCategories':
                $categories = $contacto->getCategories();
                if ($categories == false){
                    echo json_encode(['code' => '1', 'message' => 'No categories available']);
                } else {
                    echo json_encode(['code' => '0', 'message' => 'There are categories', 'data' => $categories]);
                }
                break;
            case 'deleteCategory':
                if (!isset($_POST['id'])){
                    echo json_encode(['code' => '1', 'message' => 'The category is empty']);
                    exit;
                }
                $id = $_POST['id'];
                $resp = $contacto->deleteCategory($id);
                echo json_encode($resp);
                break;
            case 'updateNameCategory':
                if (!isset($_POST['id']) || !isset($_POST['nombre'])){
                    echo json_encode(['code' => '1', 'message' => 'The category is empty']);
                    exit;
                }
                $id = $_POST['id'];
                $nombre = $_POST['nombre'];
                $resp = $contacto->updateNameCategory($id, $nombre);
                echo json_encode($resp);
                break;
            case 'updateStatusCategory':
                if (!isset($_POST['id']) || !isset($_POST['estado'])){
                    echo json_encode(['code' => '1', 'message' => 'The category is empty']);
                    exit;
                }
                $id = $_POST['id'];
                $estado = $_POST['estado'];
                $resp = $contacto->updateStatusCategory($id, $estado);
                echo json_encode($resp);
                break;
            case 'getPosts':
                $posts = $contacto->getPosts();
                if ($posts == false){
                    echo json_encode(['code' => '1', 'message' => 'No posts available']);
                } else {
                    echo json_encode(['code' => '0', 'message' => 'Posts available', 'data' => $posts]);
                }
                break;
            case 'deletePost':
                if (!isset($_POST['id'])){
                    echo json_encode(['code' => '1', 'message' => 'The post is empty']);
                    exit;
                }
                $id = $_POST['id'];
                $resp = $contacto->deletePost($id);
                echo json_encode($resp);
                break;
            case 'changeStatusPost':
                if (!isset($_POST['id']) || !isset($_POST['status'])){
                    echo json_encode(['code' => '1', 'message' => 'The post is empty']);
                    exit;
                }
                $id = $_POST['id'];
                $estado = $_POST['status'];
                $resp = $contacto->updateStatusPost($id, $estado);
                echo json_encode($resp);
                break;
        }
    }

    if (isset($_POST ['categoria'])){
        $categoria = $_POST['categoria'];
        $categoria = preg_replace('/[^a-zA-Z0-9\s]/', '', $categoria);
        if ($categoria == ''){
            echo json_encode(['code' => '1', 'message' => 'The category is empty']);
            exit;
        }
        $validCategory = $contacto->validCategory($categoria);
        if ($validCategory['code'] == '1'){
            echo json_encode($validCategory);
            exit;
        }
        $resp = $contacto->addCategory($categoria);
        echo json_encode($resp);
    }
    if (isset($_POST['nPass']) && isset($_POST['cPass'])){
        $resp = $contacto->updatePass($_POST['nPass'], $_POST['cPass'], $_SESSION['idUser']);
        echo json_encode($resp);
    }

    if (isset($_POST['myName']) && isset($_POST['myLastName']) && isset($_POST['myUserName']) && isset($_POST['myEmail'])){
        $update = $contacto->updateInfoUser($_POST['myName'], $_POST['myLastName'], $_POST['myUserName'], $_POST['myEmail']);

        echo json_encode($update);
    }

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
    
        $resp = array('code' => '0', 'message' => 'Post inserted successfully');
    
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
                if ($fileSize < 10000000) { // 10MB is 10000000 bytes
                    if (move_uploaded_file($fileTmpName, $fileDestination)) {
                        $resp = array('code' => '0', 'message' => 'The image was uploaded successfully');
                        echo json_encode($resp);
                        exit;
                    } else {
                        $resp = array('code' => '1', 'message' => 'Failed to upload the image');
                        echo json_encode($resp);
                        exit;
                    }
                } else {
                    $resp = array('code' => '1', 'message' => 'The image is too large');
                    echo json_encode($resp);
                    exit;
                }
            } else {
                $resp = array('code' => '1', 'message' => 'An error occurred while uploading the image');
                echo json_encode($resp);
                exit;
            }
        } else {
            $resp = array('code' => '1', 'message' => 'Cannot upload files of this type');
            echo json_encode($resp);
            exit;
        }

    }
}