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

    <div class="w-90 mx-auto">
        <h1 class="text-3xl font-bold text-center my-5">Add Category</h1>
        <form class="max-w-[1000px] mx-auto" id="container-category">
            <div class="flex flex-col md:flex-row">
                <div class="mb-4 w-full">
                    <label for="categoria" class="block text-gray-700">Category:</label>
                    <input type="text" name="categoria" id="categoria" maxlength="100" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-1 pl-2 min-h-10 border" placeholder="Write a title" required>
                </div>
            </div>
            <button type="submit" name='crear_cat' id="crear_cat" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add</button>
        </form>
    </div>

    <?php include '../views/footer_manage.php'; ?>

    <script src="../js/popper.min.js"></script>
    <script src="../js/sidebar.js"></script>
    <script src="../js/addCatetogory.js"></script>  
    <script src="../js/countVisits.js"></script>
</body>
</html>