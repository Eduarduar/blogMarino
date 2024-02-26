<?php
        if (isset($_GET["post"])) {
            $idPost = $_GET["post"];
        } else {
            $idPost = -1;
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
                echo "<h1 class='title-public'>" . htmlspecialchars($titulo['titulo']) . "</h1>";
                echo "
                <div class='heading'>
                    <p>" . htmlspecialchars($titulo['autor']) . " - " . htmlspecialchars($titulo['fecha']) . "</p>
                </div>";
            } else {
                echo "<h1>Publicación no encontrada</h1>";
            }
            
            // Obtener y mostrar el contenido de la publicación (textos e imágenes)
            $contenido;
            if (basename($_SERVER['PHP_SELF']) == 'index.php') {        
                $textos = $contacto->obtenerTextoUltimaPublicacion();
                $imagenes = $contacto->obtenerImagenUltimaPublicacion();   
            }else{
                $textos = $contacto->obtenerTextoPublicacion($idPost);
                $imagenes = $contacto->obtenerImagenPublicacion($idPost);          
                // var_dump($textos);
                // var_dump($imagenes);
            }

            if ($textos != false) {
                $contenido = []; // Initialize an empty array

                foreach ($textos as $contenidoTextos) {
                    $contenido['modulo' . $contenidoTextos['positionText']] = [
                        'tipo' => 'texto',
                        'contenido' => '' . $contenidoTextos['text'],
                        'position' => '' . $contenidoTextos['positionText']
                    ];
                }

                if ($imagenes != false) {
                    foreach ($imagenes as $contenidoImagenes) {
                        $contenido['modulo' . $contenidoImagenes['positionImagen']] = [
                            'tipo' => 'imagen',
                            'contenido' => '' . $contenidoImagenes['imagen'],
                            'position' => '' . $contenidoImagenes['positionImagen']
                        ];
                    }
                }

                // Sort the array by the position of each module
                ksort($contenido);

                foreach ($contenido as $modulo) {
                    if ($modulo['tipo'] == 'texto') {
                        echo "<p class='text-public'>" . htmlspecialchars($modulo['contenido']) . "</p>";
                    }else {
                        echo "<img src='" . htmlspecialchars($modulo['contenido']) . "'/>";
                    }
                }
                
            } else {
                echo "<p>No hay contenido adicional para mostrar.</p>";
            }

            ?>
    </div>