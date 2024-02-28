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
    <link rel="stylesheet" href="../css/style_SideBar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../css/style_fonts.css">
    <!-- <link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css" rel="stylesheet"/> -->
    <title>Manage - DEEP OCEAN</title>
</head>
<body>

    <?php include '../views/menu_manage.php'; ?>

<div class="w-90 mx-auto">
    <h1 class="text-3xl font-bold text-center my-5">Add Post</h1>
    <form class="max-w-[1000px] mx-auto">
        <div class="flex flex-col md:flex-row">
            <div class="mb-4 w-full md:w-3/5 md:mb-0 md:mx-0">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" id="title" name="title" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-1 pl-2 min-h-10 border">
            </div>
            <div class="mb-4 w-full md:w-2/5 md:ml-5">
                <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                <select id="category" name="category" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="1">Category 1</option>
                    <option value="2">Category 2</option>
                    <option value="3">Category 3</option>
                    <option value="4">Category 4</option>
                    <option value="5">Category 5</option>
                </select>
            </div>
        </div>
        <div class="mt-5">
            <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
            <textarea id="content" name="content" class="p-2 mt-1 block w-full border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm min-h-[200px] text-lg"></textarea>
        </div>
        <div class="mt-5">
            <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
            <img src="../source/img/fondo-login.jpg" alt="Image" class="w-50 object-cover rounded-md border border-gray-300 mx-auto max-h-[500px]">
            <div class="flex justify-center">
                <button class="hover:bg-red-700 font-bold lg:py-4 lg:px-8 rounded border border-red-500 text-red-600 hover:text-white transition duration-300 mt-2 py-2 px-4 text-sm mr-2 " type="button">
                    Delete Image
                </button>
                <button class="hover:bg-yellow-700 font-bold lg:py-4 lg:px-8 rounded border border-yellow-500 text-yellow-600 hover:text-white transition duration-300 mt-2 py-2 px-4 text-sm ml-2 " type="button">
                    Change Image
                </button>
            </div>
        </div>
        <div class="mt-5">
            <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
            <textarea id="content" name="content" class="p-2 mt-1 block w-full border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm min-h-[200px] text-lg"></textarea>
            <div class="flex justify-center">
                <button class="hover:bg-red-700 font-bold lg:py-4 lg:px-8 rounded border border-red-500 text-red-600 hover:text-white transition duration-300 mt-2 sm:py-2 sm:px-4 sm:text-sm" type="button">
                    Delete Text
                </button>
            </div>
        </div>
        <!-- barra de separación -->
        <hr class="my-5">
        <div class="flex justify-center mt-5">
            <button class="hover:bg-green-700 font-bold lg:py-4 lg:px-8 rounded border border-green-500 text-green-600 hover:text-white transition duration-300 mr-2 py-2 px-4 text-sm" type="button">
                Add Text
            </button>
            <button class="hover:bg-blue-700 font-bold lg:py-4 lg:px-8 rounded border border-blue-500 text-blue-600 hover:text-white transition duration-300 ml-2 py-2 px-4 text-sm" type="button">
                Add Image
            </button>
        </div>
    </form>
</div>
    

    <?php include '../views/footer_manage.php'; ?>

            
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
    <!-- <script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/sidebar.js"></script>  
</body>
</html>
