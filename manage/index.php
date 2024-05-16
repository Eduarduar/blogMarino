<?php

  session_start();

  if (!isset($_SESSION['idUser'])) {
    header('Location: ../');
  }

  include '../db/peticiones/manage.php';

  $contacto = new Contacto();

  $UserName = $contacto->getUserName($_SESSION['idUser']);

  $visits = number_format($contacto->getCountVisits(), 0, '.', ',');
  $posts = number_format($contacto->getCountPosts(), 0, '.', ',');
  $categories = number_format($contacto->getCountCategories(), 0, '.', ',');

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


    <div class="container mx-auto mt-10 flex flex-col">

      <div class="w-full hidden lg:block h-[50vh] bg-[url(../source/img/vidamarina.jpg)] mb-2 rounded-lg">

        <div class="w-full h-full bg-[rgba(0,0,0,0.5)] flex flex-col">

          <div class="w-full flex flex-row items-end justify-center h-1/2">
              <span class="text-gray-200 text-[2.5rem] font-bold">Hello, welcome back</span>
          </div>

          <div class="w-full flex flex-row items-start justify-center h-1/2">
            <span class="text-[#00aeff] text-[2.5rem] font-bold text-start"><?php echo $UserName['nombre']; ?></span>
          </div>

        </div>

      </div>

      <div class="flex flex-wrap justifi-betweem flex-col md:flex-row">
        <div class="bg-white w-full p-4 rounded-lg shadow-lg">
          <div class="flex flex-col">
            <div class="flex items-center justify-between">
              <div class="flex items-center">
                <i class="ri-user-location-line text-4xl text-blue-500"></i>
                <span class="text-2xl font-bold ml-2">Visits</span>
              </div>
              <span class="text-blue-500 text-2xl font-bold mr-10">
                <?php echo $visits; ?>
              </span>
            </div>
          </div>
        </div>

        <div class="w-full lg:w-1/2 p-2">
          <div class="bg-white w-full p-4 rounded-lg shadow-lg">
            <div class="flex flex-col">
              <div class="flex items-center justify-between">
                <div class="flex items-center">
                  <i class="ri-article-line text-4xl text-yellow-400"></i>
                  <span class="text-2xl font-bold ml-2">Posts</span>
                </div>
                <span class="text-2xl font-bold text-yellow-400">
                  <?php echo $posts; ?>
                </span>
              </div>
              <div class="mx-auto">
                <a href="./viewPosts" class="text-xl font-bold underline decoration-1 ml-2">More details</a>
              </div>
            </div>
          </div>
        </div>

        <div class="w-full lg:w-1/2 p-2">
          <div class="bg-white w-full p-4 rounded-lg shadow-lg">
            <div class="flex flex-col">
              <div class="flex items-center justify-between">
                <div class="flex items-center">
                  <i class="ri-list-check text-4xl text-orange-400"></i>
                  <span class="text-2xl font-bold ml-2">Categories</span>
                </div>
                <span class="text-2xl font-bold text-orange-400">
                  <?php echo $categories; ?>
                </span>
              </div>
              <div class="mx-auto">
                <a href="./categories" class="text-xl font-bold underline decoration-1 ml-2">More details</a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>


    <?php include '../views/footer_manage.php'; ?>

    <script src="../js/popper.min.js"></script>
    <script src="../js/sidebar.js"></script>  
    <script src="../js/countVisits.js"></script>
</body>
</html>
