<?php

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
    <link rel="stylesheet" href="./css/style_publicacion.css">
    <link rel="stylesheet" href="./css/style_footer.css">
    <title>Publicaciones</title>
</head>
<body id="page-top">

    <header>

        <!-- Navigation -->
        <?php include 'views/navBar.php'; ?>

    </header> <br><br><br>

    <?php
    
        include './views/publicacion.php';
    
    ?>

    <!-- Footer -->

    <?php include 'views/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./js/navBar.js"></script>

</body>
</html>
