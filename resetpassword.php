<?php

    session_start();

    if (isset($_SESSION['idUser'])) {
        header('Location: ./');
    }
    if(!isset($_GET['code'])){
        header("Location: ./404");
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Change Password</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="./source/library/jquery/jquery-3.6.0.min.js"></script> 
        <script src="./source/library/fontawesome-free-5.15.4-web/js/all.min.js"></script>
        <script src="./source/library/Tailwind/Tailwind.min.js"></script>
        <link rel="stylesheet" href="./css/style_login.css">
    </head>
    <body class="overflow-y-hidden h-full">
        <div class="background">
        <div class="video-overlay"></div>
        <video src="./source/video/video_carrusel.mp4" class="absolute top-0 left-0 w-full h-full object-cover" autoplay muted loop></video>
        </div>
        <div class="login-box">
        <div class="exit-container">
            <a href="./login">
            <b class="fas fa-times sm:text-3xl md:text-2x1 "></b>
            </a>
        </div>
        <h2 class="text-[2rem]">Change Password</h2>
        <form class="form">
            <div class="user-box">
                <input type="password" id="newPassword" required="">
                <label>New Password</label>
            </div>
            <div class="user-box">
                <input type="password" id="confirmPassword" required="">
                <label>Confirm Password</label>
            </div>
            <div class="container-button">
            <i class="log" href="">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <button class="boton-personalizado" name="log_in">
                CONFIRM
                </button> 
            </i>
            </div>
            <div class="error-box display-none">
            </div>
        </form>
        </div>  
        <div class="access-box display-none">
            You have successfully changed your password
        </div>

        <script src="./js/changePassword.js"></script>
        <script src="./js/countVisits.js"></script>
    </body>
</html>
