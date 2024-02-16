<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/997c58a28f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://startbootstrap.com/templates/agency/font-awesome-4.1.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/style_navBar.css">
    <link rel="stylesheet" href="./css/style_footer.css">
    <title>Publicaciones</title>
</head>
<body id="page-top">

    <header>

        <!-- Navigation -->
        <?php include 'views/navBar.php'; ?>

    </header> <br><br><br>

    <?php
        include './db/peticiones/publicaciones.php'; // Asegúrate de incluir el archivo donde definiste la clase Contacto

        $contacto = new Contacto();
        $idPost = 6; // Asegúrate de obtener el ID de la publicación de forma dinámica según sea necesario
    ?>

    <div style="text-align: center;">
        <?php
            // Obtener el título de la publicación y mostrarlo
            $titulo = $contacto->obtenerTituloPublicacion($idPost);
            if ($titulo !== null) {
                echo "<h1>" . htmlspecialchars($titulo) . "</h1>";
            } else {
                echo "<h1>Publicación no encontrada</h1>";
            }

            // Obtener y mostrar el contenido de la publicación (textos e imágenes)
            $resultado = $contacto->obtenerContenidoPublicacion($idPost);
            if ($resultado->num_rows > 0) {
                while($fila = $resultado->fetch_assoc()) {
                    if ($fila["tipo"] == "texto") {
                        // Mostrar texto
                        echo "<p>" . htmlspecialchars($fila["contenido"]) . "</p>";
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

    <!-- Footer -->

    <?php include 'views/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./js/navBar.js"></script>

</body>
</html>
