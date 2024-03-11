<?php

    session_start();

    include './db/peticiones/publicacion.php';

    $contacto = new Contacto();

?>


<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="./source/library/jquery/jquery-3.6.0.min.js"></script> 
        <script src="./source/library/bootstrap/bootstrap5.3.2.min.js"></script> 
        <link rel="stylesheet" href="./source/library/jquery/jquery-ui-1.13.2.min.css">
        <link rel="stylesheet" href="./source/library/bootstrap/bootstrap3.2.0.min.css"> 
        <link rel="stylesheet" href="./source/library/fontawesome-free-5.15.4-web/css/all.min.css">
        <link rel="stylesheet" href="./css/style_navBar.css">
        <link rel="stylesheet" href="./css/style_default.css">
        <link rel="stylesheet" href="./css/style_publicacion.css">
        <link rel="stylesheet" href="./css/style_footer.css">
        <title>Publicaciones</title>
    </head>
    <body id="page-top">

        <header>

            <!-- Navigation -->
            <?php include 'views/navBar.php'; ?>

        </header> <br><br><br>

        <section>
            <?php

                include './views/publicacion.php';

            ?>
        </section>

        <!-- Footer -->

        <?php include 'views/footer.php'; ?>

        <script src="./js/navBar.js"></script>
        <script src="./js/countVisits.js"></script>

    </body>
</html>
