<?php

    session_start();

    include("db/peticiones/blog.php");

    $contacto = new Contacto();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="./source/library/jquery/jquery-3.6.0.min.js"></script> 
        <script src="./source/library/bootstrap/bootstrap5.3.2.min.js"></script> 
        <script src="./source/library/fontawesome/fontawesome.js"></script> 
        <link rel="stylesheet" href="./source/library/jquery/jquery-ui-1.13.2.min.css">
        <link rel="stylesheet" href="./source/library/bootstrap/bootstrap3.2.0.min.css"> 
        <link rel="stylesheet" href="./source/library/fontawesome-free-5.15.4-web/css/all.min.css">
        <link rel="stylesheet" href="./css/style_navBar.css">
        <link rel="stylesheet" href="./css/style_default.css">
        <link rel="stylesheet" href="./css/style_blog.css">
        <link rel="stylesheet" href="./css/style_footer.css">
        <title>Blog - DEEP OCEAN</title>
    </head>
    <body>

        <header>

            <!-- Navigation -->
            <?php include 'views/navBar.php'; ?>

        </header>

        <section class="container-search">

            <input class="form-control input-lg" type="text" placeholder="Search">
            
            <!-- <select class="form-control input-lg">
                <option value="Hola">Hola</option>
                <option value="Hola">Hola</option>
                <option value="Hola">Hola</option>
                <option value="Hola">Hola</option>
                <option value="Hola">Hola</option>
            </select> -->
        
        </section>

            <!-- Cards -->
        <section class="cards">

        <?php

            $publicaciones = $contacto->obtenerTodasLasPublicaciones();

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
            } else {
                echo "<h1>No hay publicaciones</h1>";
            }
            

        ?>
        </section>


        <!-- Footer -->

        <?php include 'views/footer.php'; ?>

        <script src="./js/navBar.js"></script>
        <script src="./js/blog.js"></script>
        <script src="./js/countVisits.js"></script>

            
    </body>
</html>


