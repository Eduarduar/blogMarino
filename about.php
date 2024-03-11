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
        <link rel="stylesheet" href="./css/style_about.css">
        <title>About - DEEP OCEAN</title>
    </head>
    <body>

        <header>

            <!-- Navigation -->
            <?php include 'views/navBar.php'; ?>

        </header>

        <!-- About -->
        <section>
            <div class="heading">
                <h1>About</h1>
                <p>Welcome to DEEP OCEAN - Exploring the deep sea</p>
            </div>
            <div class="container-about">
                <div class="About">
                    </div>
                    <div class="about-content">
                        <br><br><h2>Our mission</h2>
                        <p>In a world where connection to nature is often lost in the daily routine, DEEP OCEAN seeks to inspire a deeper love for the oceans. We believe that by sharing captivating stories, stunning images and scientific knowledge, we can help raise awareness about the importance of preserving our marine ecosystems. Underwater life is a mysterious and beautiful universe that deserves to be explored and understood. We are excited to have you on board as we explore together the wonders the ocean has to offer. Join us on this journey into the unknown, where each publication is a dive into the richness of underwater life. Dive with DEEP OCEAN and discover a world of wonders beneath the surface!</p>
                        <br><a href="https://www.un.org/sustainabledevelopment/es/oceans/" target="_blank" class="btn btn-info">Read More</a>
                    </div>
                    <div class="about-image">
                        <img src="source/img/ocean.jpg"> <br>
                </div>
            </div>
        </section>
        <!-- Footer -->

        <?php include 'views/footer.php'; ?>
        
        <script src="./js/navBar.js"></script>
        <script src="./js/countVisits.js"></script>

            
    </body>
</html>
