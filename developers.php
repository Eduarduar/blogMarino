<?php

    session_start();

?>
<!DOCTYPE html>
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
        <link rel="stylesheet" href="./css/style_footer.css">
        <link rel="stylesheet" href="./css/style_developers.css">
        <title>Developers - DEEP OCEAN</title>
    </head>
    <body>

        <header>

            <!-- Navigation -->
            <?php include 'views/navBar.php'; ?>

        </header>

        <!-- About -->
        <section>
            <br><br><br>
            <div style="text-align: center;">
                <h1>Developers</h1><br>
                <p>DEEP OCEAN is a project developed by students from the University of Colima, majoring in Software Engineering.</p>
                <p>The developers are:</p>

                <div class="row">
                    <div class="col-lg-4">
                        <img src=".\source\img\eduardo.png" alt="Developer 1" style="width: 200px; height: 200px; border-radius: 50%;">
                        <h2>ARCEGA RODRIGUEZ EDUARDO</h2>
                        <p>Software Engineering student at the University of Colima.</p>
                    </div>
                    <div class="col-lg-4">
                        <img src=".\source\img\jaz.png" alt="Developer 2" style="width: 200px; height: 200px; border-radius: 50%;">
                        <h2>DOMINGUEZ MARCOS JAZMIN</h2>
                        <p>Software Engineering student at the University of Colima.</p>
                    </div>
                    <div class="col-lg-4">
                        <img src=".\source\img\gera.png" alt="Developer 3" style="width: 200px; height: 200px; border-radius: 50%;">
                        <h2>GUTIERREZ RUA GERARDO ADONAI</h2>
                        <p>Software Engineering student at the University of Colima.</p>
                    </div>
                    <div class="col-lg-6">
                        <img src=".\source\img\jan.png" alt="Developer 4" style="width: 200px; height: 200px; border-radius: 50%;">
                        <h2>HIDALGO ROSAS JAN CARLO</h2>
                        <p>Software Engineering student at the University of Colima.</p>
                    </div>
                    <div class="col-lg-6">
                        <img src=".\source\img\rafa.png" alt="Developer 5" style="width: 200px; height: 200px; border-radius: 50%;">
                        <h2>VUELVAS PÉREZ RAFAEL ALEXANDRO</h2>
                        <p>Software Engineering student at the University of Colima.</p>
                    </div>
                </div>
            </div>            
        </section>

        <!-- Footer -->

        <?php include 'views/footer.php'; ?>

        <script src="./js/navBar.js"></script>
        <script src="./js/countVisits.js"></script>

            
    </body>
</html>