<?php

    session_start();

    include './db/peticiones/publicacion.php';

    $contacto = new Contacto();

?>


<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="./source/library/jquery/jquery-3.6.0.min.js"></script> 
        <script src="./source/library/bootstrap/bootstrap5.3.2.min.js"></script> 
        <script src="./source/library/fontawesome/fontawesome.js"></script>     
        <link rel="stylesheet" href="./source/library/jquery/jquery-ui-1.13.2.min.css">
        <link rel="stylesheet" href="./source/library/bootstrap/bootstrap3.2.0.min.css"> 
        <link rel="stylesheet" href="./source/library/fontawesome-free-5.15.4-web/css/all.min.css">
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

        <section>
            <?php

                include './views/publicacion.php';

            ?>

            <style>

                #disqus_thread {
                    width: 80%; /* Ajusta el ancho según tu preferencia */
                    display: flex;
                    justify-content: center; /* Centra el contenido horizontalmente */
                    align-items: center; /* Centra el contenido verticalmente */
                    margin: 0 auto; /* Centra el contenido horizontalmente */
                }
            </style>

            <div id="disqus_thread"></div>
                <script>
                    (function() { 
                        var d = document, s = d.createElement('script');
                        s.src = 'https://deep-ocean.disqus.com/embed.js'; // Reemplaza YOUR_SHORTNAME con tu shortname de Disqus
                        s.setAttribute('data-timestamp', +new Date());
                        (d.head || d.body).appendChild(s);
                    })();
                </script>
                <noscript>Por favor habilita JavaScript para ver los <a href="https://disqus.com/?ref_noscript">comentarios powered by Disqus.</a></noscript>
            </div>
        </section>

        <!-- Footer -->

        <?php include 'views/footer.php'; ?>

        <script src="./js/navBar.js"></script>
        <script src="./js/countVisits.js"></script>

    </body>
    <script id="dsq-count-scr" src="//deep-ocean.disqus.com/count.js" async></script>
</html>
