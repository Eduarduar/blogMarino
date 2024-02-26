<?php

    session_start();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://startbootstrap.com/templates/agency/font-awesome-4.1.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="./css/style_navBar.css">
        <link rel="stylesheet" href="./css/style_default.css">
        <link rel="stylesheet" href="./css/style_footer.css">
        <link rel="stylesheet" href="./css/style_about.css">
        <title>About - DEEP OCEAN</title>
    </head>
    <body>

        <header>

            <!-- Navigation -->
            <?php include 'views/navBar.php'; ?>

        </header>

        <!-- About -->
        <section>
            <div class="heading">
                <h1>About</h1>
                <p>Bienvenidos a DEEP OCEAN - Explorando las produndidades Marinas</p>
            </div>
            <div class="container">
                <section class="About">
                    <div class="about-image">
                        <img src="source/img/ocean.jpg"> <br>
                    </div>
                    <div class="about-content">
                        <br><br><h2>Nuestra Misión</h2>
                        <p>En un mundo donde la conexión con la naturaleza a menudo se pierde en la rutina 
                        diaria, DEEP OCEAN  busca inspirar un amor más profundo por los océanos.
                        Creemos que al compartir historias cautivadoras, imágenes impresionantes y
                        conocimientos científicos, podemos contribuir a despertar conciencia sobre la
                        importancia de preservar nuestros ecosistemas marinos.
                        La vida submarina es un universo misterioso y hermoso que merece ser explorado
                        y comprendido. Estamos emocionados de tenerte a bordo mientras exploramos juntos
                        las maravillas que el océano tiene para ofrecer. Acompáñanos en este viaje hacia lo
                        desconocido, donde cada publicación es un buceo en la riqueza de la vida submarina.
                        ¡Sumérgete con DEEP OCEAN y descubre un mundo de maravillas bajo la superficie!</p>
                        <br><a href="https://www.un.org/sustainabledevelopment/es/oceans/" target="_blank" class="read-more">Read More</a>
                    </div>
                </section>
            </div>
        </section>
        <!-- Footer -->

        <?php include 'views/footer.php'; ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="./js/navBar.js"></script>

            
    </body>
</html>