<?php

    session_start();

    include("db/peticiones/index.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/997c58a28f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://startbootstrap.com/templates/agency/font-awesome-4.1.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/style_navBar.css">
    <link rel="stylesheet" href="./css/style_carrusel.css">
    <link rel="stylesheet" href="./css/style_default.css">
    <link rel="stylesheet" href="./css/style_publicacion.css">
    <link rel="stylesheet" href="./css/style_footer.css">
    <link rel="stylesheet" href="./css/style_index.css">
    <title>Home - DEEP OCEAN</title>
</head>
<body id="page-top">

    <header>

        <!-- Navigation -->
        <?php include 'views/navBar.php'; ?>

    </header>

    <!-- Carousel -->
    <section>
        <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel" data-slide-to="0" class="active"></li>
                <li data-target="#carousel" data-slide-to="1"></li>
                <li data-target="#carousel" data-slide-to="2"></li>
                <li data-target="#carousel" data-slide-to="3"></li>
                <li data-target="#carousel" data-slide-to="4"></li>
                <li data-target="#carousel" data-slide-to="5"></li>
            </ol>
            <!-- Carousel items -->
            <div class="carousel-inner">
                <div class="item active"><img src="./source/img/vidamarina.jpg" alt=""></div>
                <div class="item"><img src="./source/img/imagen2.jpg" alt=""></div>
                <div class="item"><img src="./source/img/imagen3.jpg" alt=""></div>
                <div class="item"><img src="./source/img/imagen4.jpg" alt=""></div>
                <div class="item"><img src="./source/img/imagen5.jpg" alt=""></div>
                <div class="item"><img src="./source/img/imagen6.webp" alt=""></div>
            </div>
            <!-- Carousel nav -->
            <a class="carousel-control left" href="#carousel" id="prev" data-slide="prev">&lsaquo;</a>
            <a class="carousel-control right" href="#carousel" id="next" data-slide="next">&rsaquo;</a>
        </div>
    </section>
    

    <!-- Lastest Post -->
    <section>

        <h1 class="lastestPost">Lastest Post</h1>

        <?php
    
            include './views/publicacion.php';
    
        ?>
    </section>

    <!-- Footer -->

    <?php include 'views/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./js/navBar.js"></script>
    <script src="./js/index.js"></script>

</body>
</html>
