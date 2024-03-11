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

    <h1 class="text-3xl font-bold leading-9 text-gray-900 text-center my-10">Categories</h1>

    <div class="">
        <table id="postsTable" class="min-w-full divide-y divide-gray-200 overflow-x-visible md:overflow-x-scroll">
            <thead>
                <tr>
                    <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Category</th>
                    <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php
                    $categorias = $contacto->getCategories();
                    if ($categorias != false){
                        $toggleBG = true;
                        $fondo = "";
                        foreach($categorias as $categoria){
                            if ($toggleBG){
                                $toggleBG = false;
                                $fondo = "bg-gray-100";
                            } else {
                                $toggleBG = true;
                                $fondo = "";
                            }

                ?>
                <tr class="<?php echo $fondo; ?>">
                    <td class="<?php echo $fondo; ?> px-6 py-4 whitespace-no-wrap w-1/4 sm:w-auto"><?php echo $categoria["id"]; ?></td>
                    <td class="<?php echo $fondo; ?> px-6 py-4 whitespace-no-wrap w-1/4 sm:w-auto"><?php echo $categoria["nombre"]; ?></td>
                    <td class="<?php echo $fondo; ?> px-6 py-4 whitespace-no-wrap flex flex-wrap space-between w-1/4 sm:w-auto">
                        <button data-id="<?php echo $categoria["id"]; ?>" class="hover:bg-blue-500 bg-transparent border-blue-500 text-blue-500 border hover:text-white font-bold py-1 px-4 rounded mr-2 mb-2 text-xl transition duration-300 max-w-[54px] max-h-[41px]"><i class="ri-edit-box-line"></i></button>
                        <button data-id="<?php echo $categoria["id"]; ?>" class="hover:bg-red-500 bg-transparent border-red-500 text-red-500 border hover:text-white font-bold py-1 px-4 rounded text-xl transition duration-300 max-w-[54px] max-h-[41px]"><i class="ri-delete-bin-line"></i></button>
                    </td>
                </tr>
                <?php
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>


    <?php include '../views/footer_manage.php'; ?>

    <script src="../js/popper.min.js"></script>
    <script src="../js/sidebar.js"></script>  
    <script src="../js/countVisits.js"></script>
    <script>
        $(document).ready(function() {
            $('#postsTable').DataTable();
        });
    </script>
</body>
</html>