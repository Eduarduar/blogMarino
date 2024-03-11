<?php

    session_start();

    include './db/peticiones/publicacion.php';

    $filePath = $_SERVER['REQUEST_URI'];
    $folderFolder = basename(dirname($filePath));

    $currentDir = dirname($_SERVER['PHP_SELF']);
    $currentName = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));


    
    if ($folderFolder != 'blogMarino') {
        header('Location: /pruebas/blogMarino/404');
    } 

    if ($currentName != '404.php') {
        if ($currentName == '404' || $currentName == '404.php') {
        }else {        
            header('Location: /pruebas/blogMarino/404');
        }
    }elseif ($currentName != '404') {
        header('Location: /pruebas/blogMarino/404');
    }

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <script src="./source/library/jquery/jquery-3.6.0.min.js"></script> 
    <script src="./source/library/fontawesome-free-5.15.4-web/js/all.min.js"></script>
    <script src="./source/library/bootstrap/bootstrap5.3.2.min.js"></script> 
    <link rel="stylesheet" href="./source/library/jquery/jquery-ui-1.13.2.min.css">
    <link rel="stylesheet" href="./source/library/bootstrap/bootstrap3.2.0.min.css"> 
    <link rel="stylesheet" href="./source/library/fontawesome-free-5.15.4-web/css/all.min.css">
    <?php
        $currentDir = dirname($_SERVER['PHP_SELF']);
        $cssPath = $currentDir . '/css/';
    ?>
    <link rel="stylesheet" href="<?php echo $cssPath; ?>style_navBar.css">
    <link rel="stylesheet" href="<?php echo $cssPath; ?>style_default.css">
    <link rel="stylesheet" href="<?php echo $cssPath; ?>style_404.css">
    <link rel="stylesheet" href="<?php echo $cssPath; ?>style_footer.css">
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

    <script src="./js/navBar.js"></script>

</body>
</html>
