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
    <link rel="stylesheet" href="../css/style_default.css">
    <link rel="stylesheet" href="../css/style_fonts.css">
    <link rel="stylesheet" href="../css/style_SideBar.css">
    <title>Manage - DEEP OCEAN</title>
</head>
<body>

    <?php include '../views/menu_manage.php'; ?>

<div id="messageContainer" class="absolute top-12 left-1/2 transform -translate-x-1/2 -translate-y-[300%] bg-green-500 bg-opacity-90 box-border shadow-lg rounded-lg transition-all duration-500 z-3 px-5 py-2 messageContainer">
    <p id="message" class="text-white text-center text-xl">‎ </p>
</div>

<div class="w-90 mx-auto">
    <h1 class="text-3xl font-bold text-center my-5">Add Post</h1>
    <form class="max-w-[1000px] mx-auto" id="container-post">
        <div class="flex flex-col md:flex-row">
            <div class="mb-4 w-full md:w-3/5 md:mb-0 md:mx-0">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" id="title" name="title" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-1 pl-2 min-h-10 border" maxlength="100" placeholder="Write a title" required>
            </div>
            <div class="mb-4 w-full md:w-2/5 md:ml-5">
                <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                <select id="category" name="category" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>

                <?php
                
                    $categories = $contacto->getCategories();

                    var_dump($categories);

                    if (!$categories) {
                        echo '<option value="0"> No categories </option>';
                    }else {
                        echo '<option value="0"> Select a category </option>';
                        foreach ($categories as $category) {
                            echo '<option value="'.$category['id'].'">'.$category['nombre'].'</option>';
                        }
                    }
                
                ?>

                </select>
            </div>
        </div>
        <div class="mt-5 text-area-container container-module">
            <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
            <textarea id="content0" name="content0" class="p-2 mt-1 block w-full border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm min-h-[200px] text-lg textarea" maxlength="1000" placeholder="Write something..." required></textarea>
        </div>
    </form>
    <!-- barra de separación -->
    <hr class="my-5">
    <div class="flex flex-col justify-center mt-5">
        <div class="container-buttons mx-auto">
            <button id="addContent" class="hover:bg-green-700 font-bold lg:py-4 lg:px-8 rounded border border-green-500 text-green-600 hover:text-white transition duration-300 mr-2 py-2 px-4 text-sm" type="button">
                Add Text
            </button>
            <button id="addImage" class="hover:bg-blue-700 font-bold lg:py-4 lg:px-8 rounded border border-blue-500 text-blue-600 hover:text-white transition duration-300 ml-2 py-2 px-4 text-sm" type="button">
                Add Image
            </button>
        </div>
        <div class="cotainer-button-sumit mx-auto">
            <button id="submit" class="hover:bg-[#31b0d5] font-bold lg:py-4 lg:px-8 rounded border border-[#31b0d5] text-[#31b0d5] hover:text-white transition duration-300 mt-5 py-2 px-4 text-sm sumit-button" type="button">
                Post
            </button>
        </div>
    </div>
</div>
    

    <?php include '../views/footer_manage.php'; ?>

    <script src="../js/popper.min.js"></script>
    <script src="../js/sidebar.js"></script>  
    <script src="../js/addPost.js"></script>
    <script src="../js/countVisits.js"></script>
</body>
</html>
