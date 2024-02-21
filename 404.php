<?php

    session_start();

    include './db/peticiones/publicacion.php';

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/997c58a28f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://startbootstrap.com/templates/agency/font-awesome-4.1.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/style_navBar.css">
    <link rel="stylesheet" href="./css/style_default.css">
    <link rel="stylesheet" href="./css/style_404.css">
    <link rel="stylesheet" href="./css/style_footer.css">
    <title>Publicaciones</title>
</head>
<body id="page-top">

    <header>

        <!-- Navigation -->
        <?php include 'views/navBar.php'; ?>

    </header> <br><br><br>

    <section class="container_not-fount">

        <div class="container-text">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="container-flex">
                        <p class="text-shadow">4</p>
                        <p class="color text-shadow">0</p>
                        <p class="text-shadow">4</p>
                    </div>
                    <div class="container-flex">
                        <p class="text-shadow">Pa</p>
                        <p class="color text-shadow">g</p>
                        <p class="text-shadow">e n</p>
                        <p class="color text-shadow">o</p>
                        <p class="text-shadow">t fou</p>
                        <p class="color text-shadow">n</p>
                        <p class="text-shadow">d</p>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- Footer -->

    <?php include 'views/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./js/navBar.js"></script>

</body>
</html>
