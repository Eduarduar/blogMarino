<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
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
    <link rel="stylesheet" href="../css/style_SideBar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css">
    <link rel="stylesheet" href="../css/style_fonts.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Manage - DEEP OCEAN</title>
</head>
<body>

    <?php include '../views/menu_manage.php'; ?>
    <form class="flex flex-col space-y-4">
        <label for="categoria">Ingrese el nombre de la categoría:</label>
        <input type="text" name="categoria" id="categoria" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">

        
    </form>
    <input type="submit" name='crear_cat' value="Agregar" id = "crear_cat" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
    <?php include '../views/footer_manage.php'; ?>

            
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/sidebar.js"></script>  
</body>
</html>
