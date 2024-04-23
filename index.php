<?php

    session_start();

    include("db/peticiones/index.php");

    $contacto = new Contacto();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- //code.jquery.com/jquery-3.6.0.min.js -->
        <script src="./source/library/jquery/jquery-3.6.0.min.js"></script> 
        <!--https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js-->
        <script src="./source/library/bootstrap/bootstrap5.3.2.min.js"></script> 
        <!-- //kit.fontawesome.com/997c58a28f.js -->
        <script src="./source/library/fontawesome/fontawesome.js"></script> 
        <!-- Ahora: https://code.jquery.com/ui/1.13.2/themes/smoothness/jquery-ui.css  original: //code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css -->
        <link rel="stylesheet" href="./source/library/jquery/jquery-ui-1.13.2.min.css">
        <!-- //maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css --> 
        <link rel="stylesheet" href="./source/library/bootstrap/bootstrap3.2.0.min.css"> 
        <!-- //maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css -->
        <link rel="stylesheet" href="./source/library/fontawesome-free-5.15.4-web/css/all.min.css"> 
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
        <section class="container-carousel">
            <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel" data-slide-to="0" class="active"></li>
                </ol>
                <!-- Carousel items -->
                <div class="carousel-inner">
                        <div class="video-overlay"></div>
                        <video src="./source/video/video_carrusel.mp4" autoplay muted loop class="h-full"></video>
                </div>
            </div>
            <div class="container-titleCarousel">
                <h2 class="titleCarousel">DEEP OCEAN</h2>
                <p class="subtitleCarousel">The best place to know about the ocean</p>
            </div>
        </section>
        <h1 class="font-bold text-6xl py-8 bg-gray-300 text-center justify-center m-0">Lastest Post</h1>
        
        
        <?php
        
            include 'views/publicacion.php';
        
        ?>


        <!-- Footer -->

        <?php include 'views/footer.php'; ?>

        <div class=""></div>

        <script src="./js/navBar.js"></script>
        <script src="./js/index.js"></script>
        <script src="./js/countVisits.js"></script>
        

    </body>
</html>
