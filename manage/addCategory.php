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
    <script src="../source/library/Tailwind/Tailwind.min.js"></script>
    <link rel="stylesheet" href="../css/style_SideBar.css">
    <link rel="stylesheet" href="../css/style_fonts.css">
    <title>Manage - DEEP OCEAN</title>
</head>
<body>

    <?php include '../views/menu_manage.php'; ?>
    <div id="messageContainer" class="absolute top-12 left-1/2 transform -translate-x-1/2 -translate-y-[300%] bg-green-500 bg-opacity-90 box-border shadow-lg rounded-lg transition-all duration-500 z-3 px-5 py-2 messageContainer">
        <p id="message" class="text-white text-center text-xl">‎ </p>
    </div>
    <form class="flex flex-col space-y-4">
        <label for="categoria">Ingrese el nombre de la categoría:</label>
        <input type="text" name="categoria" id="categoria" maxlength="100" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
    </form>
    <input type="submit" name='crear_cat' value="Agregar" id = "crear_cat" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
    
    <?php include '../views/footer_manage.php'; ?>

    <script src="../js/popper.min.js"></script>
    <script src="../js/sidebar.js"></script>
    <script src="../js/addCatetogory.js"></script>  
</body>
</html>