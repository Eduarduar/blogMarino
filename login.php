<?php
session_start();

if (isset($_SESSION['idUser'])) {
  header('Location: ./');
}

include("db/peticiones/login.php");
$error = 0;
$access = 0;

if(isset($_POST["log_in"])) {
  $usuario = $_POST['usuario'];
  $contra = $_POST['contra'];
  $obj = new Contacto();
  $log = $obj->log_in($usuario, $contra); // Si el usuario y contraseña son correctos, regresa el id del usuario
  if ($log != false) {
    $_SESSION['idUser'] = $log;
    $access = 1;
  } else {
    $error = 1;
  }
}

?>

<!DOCTYPE html>
<html lang="en" >
  <head>
    <meta charset="UTF-8">
    <title>Log In</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/997c58a28f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/style_login.css">
  </head>
  <body>

    <div class="login-box <?php if ($access == 1) echo "timeout"; ?>">
      <div class="exit-container">
        <a href="./">
          <b class="fas fa-times"></b>
        </a>
      </div>
      <h2>Login</h2>
      <form method="POST" action="./login" class="form">
        <div class="user-box">
          <input type="text" class="user" name="usuario" required="">
          <label>Username</label>
        </div>
        <div class="user-box">
          <input type="password" class="pass" name="contra" required="">
          <label>Password</label>
        </div>
        <div class="container-button">
          <i class="log" href="">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <button class="boton-personalizado" name="log_in">
              Submit
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
    <script>
        <?php
          if ($error == 1) {
            echo '
            
            $(".error-box").removeClass("display-none");
            $(".error-box").addClass("active");

            if (window.matchMedia("(max-width: 768px)").matches){
              $("body").addClass("error");
              $(".error-box").addClass("display-block active");


              $(".log").addClass("display-none");
              $(".container-button").addClass("height-108");

              setTimeout(function() {
                $(".error-box").removeClass("active");
                $(".error-box").addClass("display-none");
                $("body").removeClass("error");
                $(".container-button").removeClass("display-none");
                $(".log").removeClass("display-none");
                $(".container-button").removeClass("height-108");
              }, 3500);
            }else{

              $(".error-box").addClass("entrada");

              setTimeout(function() {
                $(".error-box").removeClass("entrada");
              }, 300);

              setTimeout(function() {
                $(".error-box").addClass("timeout");
              }, 3000);

              setTimeout(function() {
                $(".error-box").removeClass("active timeout");
                $(".error-box").addClass("display-none");
              }, 3250);
              
            }
            ';
          }

          if ($access == 1) {
            echo '

            $(".access-box").removeClass("display-none");
            $(".access-box").addClass("active");
            
            if (window.matchMedia("(max-width: 768px)").matches){
              $("body").addClass("access");
              $(".access-box").addClass("display-block");
              $(".login-box").addClass("display-none");
            } else {

              $(".access-box").addClass("entrada");

              setTimeout(function() {
                $(".access-box").removeClass("entrada");
                $(".login-box").addClass("display-none");
              }, 300);

              setTimeout(function() {
                $(".access-box").addClass("timeout");
              }, 3000);

              setTimeout(function() {
                $(".access-box").removeClass("active");
                $(".access-box").removeClass("timeout");
                $(".access-box").html("");
              }, 3300);

            }
            
            setTimeout(function() {
              window.location.href = "./";
            }, 3250);
            ';
          }
        ?>
    </script>
  </body>
</html>
