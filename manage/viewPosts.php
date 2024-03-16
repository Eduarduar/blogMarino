<?php

    session_start();

    if (!isset($_SESSION['idUser'])) {
    header('Location: ../');
    }

    include '../db/peticiones/manage.php';

    $contacto = new Contacto();

    $UserName = $contacto->getUserName($_SESSION['idUser']);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="../source/library/jquery/jquery-3.6.0.min.js"></script> 
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css">
        <link rel="stylesheet" href="../source/library/datatables/datatables.min.css"/>
        <script src="../source/library/datatables/datatables.min.js"></script>
        <script src="../source/library/bootstrap/bootstrap5.3.2.min.js"></script>
        <script src="../source/library/Tailwind/Tailwind.min.js"></script>
        <link rel="stylesheet" href="../css/style_pagetables.css">
        <link rel="stylesheet" href="../css/style_default.css">
        <link rel="stylesheet" href="../css/style_SideBar.css">
        <link rel="stylesheet" href="../css/style_fonts.css">
        <title>Manage - DEEP OCEAN</title>
    </head>
    <body>

        <?php include '../views/menu_manage.php'; ?>

        <div id="messageContainer" class="absolute top-12 left-1/2 transform -translate-x-1/2 -translate-y-[300%] bg-green-500 bg-opacity-90 box-border shadow-lg rounded-lg transition-all duration-500 z-3 px-5 py-2 messageContainer">
            <p id="message" class="text-white text-center text-xl">‎ </p>
        </div>

        <h1 class="text-5xl font-bold leading-9 text-gray-900 text-center my-10">Posts</h1>

        <div class="overflow-x-scroll lg:overflow-x-visible" id="container-table"></div>


        <?php include '../views/footer_manage.php'; ?>

        <script src="../js/popper.min.js"></script>
        <script src="../js/sidebar.js"></script>  
        <script src="../js/viewPosts.js"></script>
        <script src="../js/countVisits.js"></script>
    </body>
</html>



