<?php
        $contacto = new Contacto();
        if (isset($_GET["post"])) {
            $idPost = $_GET["post"];
        } else {
            $idPost = 0;
        }
    ?>

    <div style="text-align: center;">
        <?php
            // Obtener el título de la publicación y mostrarlo
            if (basename($_SERVER['PHP_SELF']) == 'index.php') {            
                $titulo = $contacto->obtenerTituloUltimaPublicacion();
            }else{
                $titulo = $contacto->obtenerTituloPublicacion($idPost);
            }
            if ($titulo !== null) {
                echo "<h1 class='title-public'>" . htmlspecialchars($titulo) . "</h1>";
            } else {
                echo "<h1>Publicación no encontrada</h1>";
            }
            
            // Obtener y mostrar el contenido de la publicación (textos e imágenes)
            if (basename($_SERVER['PHP_SELF']) == 'index.php') {            
                $resultado = $contacto->obtenerContenidoUltimaPublicacion();
            }else{
                $resultado = $contacto->obtenerContenidoPublicacion($idPost);
            }
            if ($resultado->num_rows > 0) {
                while($fila = $resultado->fetch_assoc()) {
                    if ($fila["tipo"] == "texto") {
                        // Mostrar texto
                        echo "<p class='text-public'>" . htmlspecialchars($fila["contenido"]) . "</p>";
                    } elseif ($fila["tipo"] == "imagen") {
                        // Mostrar imagen
                        echo "<img src='" . htmlspecialchars($fila["contenido"]) . "'/>";
                    }
                }
            } else {
                echo "<p>No hay contenido adicional para mostrar.</p>";
            }
            ?>
    </div>