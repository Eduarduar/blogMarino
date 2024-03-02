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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css"/>
    <link rel="stylesheet" href="../css/style_pagetables.css">
    <link rel="stylesheet" href="../css/style_default.css">
    <link rel="stylesheet" href="../css/style_SideBar.css">
    <link rel="stylesheet" href="../css/style_fonts.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Manage - DEEP OCEAN</title>
</head>
<body>

    <?php include '../views/menu_manage.php'; ?>

    <h1 class="text-3xl font-bold leading-9 text-gray-900 text-center my-10">Posts</h1>

    <div class="">
        <table id="postsTable" class="min-w-full divide-y divide-gray-200 overflow-x-visible md:overflow-x-scroll">
            <thead>
                <tr>
                    <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Title</th>
                    <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Content</th>
                    <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php
                    $posts = $contacto->getPosts();
                    if ($posts != false){
                        $toggleBG = true;
                        $fondo = "";
                        foreach($posts as $post){
                            if ($toggleBG){
                                $toggleBG = false;
                                $fondo = "bg-gray-100";
                            } else {
                                $toggleBG = true;
                                $fondo = "";
                            }

                ?>
                <tr class="<?php echo $fondo; ?>">
                    <td class="<?php echo $fondo; ?> px-6 py-4 whitespace-no-wrap w-1/4 sm:w-auto"><?php echo $post["id"]; ?></td>
                    <td class="<?php echo $fondo; ?> px-6 py-4 whitespace-no-wrap w-1/4 sm:w-auto"><?php echo $post["title"]; ?></td>
                    <td class="<?php echo $fondo; ?> px-6 py-4 whitespace-no-wrap w-1/4 sm:w-auto"><?php echo substr($post["content"], 0, 100) . '...'; ?></td>
                    <td class="<?php echo $fondo; ?> px-6 py-4 whitespace-no-wrap flex flex-wrap space-between w-1/4 sm:w-auto">
                        <button data-id="<?php echo $post["id"]; ?>" class="hover:bg-blue-500 bg-transparent border-blue-500 text-blue-500 border hover:text-white font-bold py-1 px-4 rounded mr-2 mb-2 text-xl transition duration-300 max-w-[54px] max-h-[41px]"><i class="ri-edit-box-line"></i></button>
                        <button data-id="<?php echo $post["id"]; ?>" class="hover:bg-red-500 bg-transparent border-red-500 text-red-500 border hover:text-white font-bold py-1 px-4 rounded text-xl transition duration-300 max-w-[54px] max-h-[41px]"><i class="ri-delete-bin-line"></i></button>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/sidebar.js"></script>  
    <script>
        $(document).ready(function() {
            $('#postsTable').DataTable();
        });
    </script>
</body>
</html>



