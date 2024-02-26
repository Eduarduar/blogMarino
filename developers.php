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
                <h1>Desarrolladores</h1><br>
                <p>DEEP OCEAN es un proyecto desarrollado por estudiantes de la Universidad de Colima de la carrera de Ingenieria de Software.</p>
                <p>Los desarrolladores son:</p>

                <div class="row">
                    <div class="col-lg-4">
                        <img src=".\source\img\eduardo.png" alt="Developer 1" style="width: 200px; height: 200px; border-radius: 50%;">
                        <h2>ARCEGA RODRIGUEZ EDUARDO</h2>
                        <p>Estudiante de Ingenieria de Software en la Universidad de Colima.</p>
                    </div>
                    <div class="col-lg-4">
                        <img src=".\source\img\jaz.png" alt="Developer 2" style="width: 200px; height: 200px; border-radius: 50%;">
                        <h2>DOMINGUEZ MARCOS JAZMIN</h2>
                        <p>Estudiante de Ingenieria de Software en la Universidad de Colima.</p>
                    </div>
                    <div class="col-lg-4">
                        <img src=".\source\img\gera.png" alt="Developer 3" style="width: 200px; height: 200px; border-radius: 50%;">
                        <h2>GUTIERREZ RUA GERARDO ADONAI</h2>
                        <p>Estudiante de Ingenieria de Software en la Universidad de Colima.</p>
                    </div>
                    <div class="col-lg-6">
                        <img src=".\source\img\jan.png" alt="Developer 4" style="width: 200px; height: 200px; border-radius: 50%;">
                        <h2>HIDALGO ROSAS JAN CARLO</h2>
                        <p>Estudiante de Ingenieria de Software en la Universidad de Colima.</p>
                    </div>
                    <div class="col-lg-6">
                        <img src=".\source\img\rafa.png" alt="Developer 5" style="width: 200px; height: 200px; border-radius: 50%;">
                        <h2>VUELVAS PÉREZ RAFAEL ALEXANDRO</h2>
                        <p>Estudiante de Ingenieria de Software en la Universidad de Colima.</p>
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