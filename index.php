<?php

    session_start();

    include("db/peticiones/index.php");

    $contacto = new Contacto();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- //code.jquery.com/jquery-3.6.0.min.js -->
        <script src="./source/library/jquery/jquery-3.6.0.min.js"></script> 
        <!--https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js-->
        <script src="./source/library/bootstrap/bootstrap5.3.2.min.js"></script> 
        <!-- //kit.fontawesome.com/997c58a28f.js -->
        <script src="./source/library/fontawesome-free-5.15.4-web/js/all.min.js"></script> 
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
                    <!-- <li data-target="#carousel" data-slide-to="1"></li>
                    <li data-target="#carousel" data-slide-to="2"></li>
                    <li data-target="#carousel" data-slide-to="3"></li>
                    <li data-target="#carousel" data-slide-to="4"></li>
                    <li data-target="#carousel" data-slide-to="5"></li> -->
                </ol>
                <!-- Carousel items -->
                <div class="carousel-inner">
                        <div class="video-overlay"></div>
                        <video src="./source/video/video_carrusel.mp4" autoplay muted loop></video>
                    <!-- <div class="item"><img src="./source/img/vidamarina.jpg" alt=""></div>
                    <div class="item"><img src="./source/img/imagen3.jpg" alt=""></div>
                    <div class="item"><img src="./source/img/imagen4.jpg" alt=""></div>
                    <div class="item"><img src="./source/img/imagen5.jpg" alt=""></div>
                    <div class="item"><img src="./source/img/imagen6.webp" alt=""></div> -->
                </div>
                <!-- Carousel nav -->
                <!-- <a class="carousel-control left" href="#carousel" id="prev" data-slide="prev">&lsaquo;</a>
                <a class="carousel-control right" href="#carousel" id="next" data-slide="next">&rsaquo;</a> -->
            </div>
            <div class="container-titleCarousel">
                <h2 class="titleCarousel">DEEP OCEAN</h2>
                <p class="subtitleCarousel">The best place to know about the ocean</p>
            </div>
        </section>
        

        <!-- Lastest Post -->
        <section>

            <h1 class="lastestPost">Lastest Post</h1>

            <?php
        
                include './views/publicacion.php';
        
            ?>
        </section>


        <!-- Cards -->
        <section class="cards">

            <?php
            
                $publicaciones = $contacto->obtenerUltimasPublicaciones();

                if ($publicaciones != false){
                    foreach ($publicaciones as $publicacion) {
                        ?>
                        
                                    <div class="basic-card basic-card-light">
                                        <div class="card-content">
                                            <span class="card-title"> <?php echo $publicacion['tTitlePublicaciones']; ?> </span>
                                            <p class="card-text">
                                                <?php echo $publicacion['tContenidoTexts']; ?>
                                            </p>
                                        </div>

                                        <div class="card-link">
                                            <a href="<?php echo "post?post=" . $publicacion['eCodePublicaciones'] ?>" title="Read Full"><span>Read Full</span></a>
                                        </div>
                                    </div>
                        
                        <?php
                    }
                }
                
            
            ?>
            
            <div class="basic-card basic-card-light more">
                <a class="card-content" href="./blog.php" >
                    <span class="card-title">More<i class="fa fa-arrow-right" aria-hidden="true"></i></span>
                </a>
            </div>

        </section>

        <!-- Footer -->

        <?php include 'views/footer.php'; ?>

        <script src="./js/navBar.js"></script>
        <script src="./js/index.js"></script>
        <script src="./js/countVisits.js"></script>
        

    </body>
</html>
