<?php
session_start();

if (isset($_SESSION['idUser'])) {
  header('Location: ./');
}

?>

<!DOCTYPE html>
<html lang="en" >
  <head>
    <meta charset="UTF-8">
    <title>Log In</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/997c58a28f.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="./css/style_login.css">
  </head>
  <body class="overflow-y-hidden h-full">
    <div class="background">
      <div class="video-overlay"></div>
      <video src="./source/video/video_carrusel.mp4" class="absolute top-0 left-0 w-full h-full object-cover" autoplay muted loop></video>
    </div>
    <div class="login-box">
      <div class="exit-container">
        <a href="./">
          <b class="fas fa-times sm:text-3xl md:text-2x1 "></b>
        </a>
      </div>
      <h2 class="text-[2.5rem]">Login</h2>
      <form method="POST" action="./login" class="form">
        <div class="user-box">
          <input type="text" class="user" name="usuario" required="">
          <label>Username</label>
        </div>
        <div class="user-box">
          <input type="password" class="pass" name="contra" required="">
          <label>Password</label>
        </div>
        <div class="mt-4">
          <input type="checkbox" class="form-checkbox rounded-full appearance-none border-2 border-gray-300 w-5 h-5 transition-colors duration-300 ease-in-out ml-1" name="accept_terms" required="" style="position: relative; top: 3px;">
            <label class="ml-2 text-white text-[1rem]">Accept <a target="_blank" href="#" class="underline">Terms and Conditions</a></label>
        </div>
        <div class="container-button">
          <i class="log" href="">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <button class="boton-personalizado" name="log_in">
              Login
            </button> 
          </i>
        </div>
      </form>
    </div>  
    <div class="access-box display-none">
        You have successfully logged in
    </div>
    <div class="error-box display-none">
        Incorrect username or password
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./js/login.js"></script>
  </body>
</html>
