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
    <link rel="stylesheet" href="../css/style_fonts.css">
    <title>Manage - DEEP OCEAN</title>
</head>
<body>

    <?php include '../views/menu_manage.php'; ?>


    <table>
        <tbody>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Content</th>
                <th>action</th>
            </tr>

            <?php
            
                $posts = $contacto->getPosts();

                if ($posts != false){

                    foreach($posts as $post){

                        ?>

                            <tr>
                                <td><?php echo $post["id"]; ?></td>
                                <td><?php echo $post["title"]; ?></td>
                                <td><?php echo $post["content"]; ?></td>
                                <td>
                                    <button data-id="1">Edit</button>
                                    <button data-id="1">Delete</button>
                                </td>
                            </tr>

                        <?php

                    }

                }
            
            ?>
        </tbody>
    </table>

    <?php include '../views/footer_manage.php'; ?>

            
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/sidebar.js"></script>  
</body>
</html>
