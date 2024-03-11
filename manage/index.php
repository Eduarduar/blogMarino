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


    <div class="container mx-auto mt-10">
      <div class="flex flex-wrap justifi-betweem">
        <div class="bg-white w-full lg:w-full xl:w-[808px] 2xl:w-[1208px]  p-4 rounded-lg shadow-lg mt-2 ml-2">
          <div class="flex flex-col">
            <div class="flex items-center justify-between">
              <div class="flex items-center">
                <i class="ri-user-location-line text-4xl text-blue-500"></i>
                <span class="text-2xl font-bold ml-2">Visits</span>
              </div>
              <span href="usuarios.php" class="text-blue-500 hover:text-blue-600 text-2xl mr-10">
                10
              </span>
            </div>
          </div>
        </div>

        <div class="bg-white w-full lg:w-full xl:w-[400px] 2xl:w-[600px]  p-4 rounded-lg shadow-lg mt-2 ml-2">
          <div class="flex flex-col">
            <div class="flex items-center justify-between">
              <div class="flex items-center">
                <i class="ri-article-line text-4xl text-yellow-400"></i>
                <span class="text-2xl font-bold ml-2">Posts</span>
              </div>
              <span href="usuarios.php" class="text-blue-500 hover:text-blue-600 text-lg  text-yellow-400">
                10
              </span>
            </div>
            <div class="mx-auto">
              <a href="#" class="text-xl font-bold underline decoration-1 ml-2">More details</a>
            </div>
          </div>
        </div>

        <div class="bg-white w-full lg:w-full xl:w-[400px] 2xl:w-[600px]  p-4 rounded-lg shadow-lg mt-2 ml-2">
          <div class="flex flex-col">
            <div class="flex items-center justify-between">
              <div class="flex items-center">
                <i class="ri-list-check text-4xl text-orange-400"></i>
                <span class="text-2xl font-bold ml-2">Categories</span>
              </div>
              <span href="usuarios.php" class="text-blue-500 hover:text-blue-600 text-lg text-orange-400">
                10
              </span>
            </div>
            <div class="mx-auto">
              <a href="#" class="text-xl font-bold underline decoration-1 ml-2">More details</a>
            </div>
          </div>
        </div>

      </div>
    </div>


    <?php include '../views/footer_manage.php'; ?>

    <script src="../js/popper.min.js"></script>
    <script src="../js/sidebar.js"></script>  
</body>
</html>
