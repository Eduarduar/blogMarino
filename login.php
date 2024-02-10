<?php
session_start();
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
        <i class="log" href="">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <button class="boton-personalizado" name="log_in">
            Submit
          </button> 
        </i>
      </form>
    </div>  
    <div class="access-box <?php if ($access == 1)echo "active entrada";?>">
      <?php
      if ($access == 1) {
        echo "You have successfully logged in";
      }
      ?>
    </div>
    <div class="error-box <?php if ($error==1)echo "active entrada";?>">
      <?php
      if ($error == 1) {
        echo "Incorrect username or password";
      }
      ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        <?php
          if ($error == 1) {
            echo "
            setTimeout(function() {
              document.querySelector('.error-box').classList.remove('entrada');
            }, 300);

            setTimeout(function() {
              document.querySelector('.error-box').classList.add('timeout');
            }, 3000);
            
            setTimeout(function() {
              document.querySelector('.error-box').classList.remove('active');
              document.querySelector('.error-box').classList.remove('timeout');
              document.querySelector('.error-box').classList.add('display-none');
            }, 3250);";
          }

            if ($access == 1) {
              echo "
              setTimeout(function() {
                document.querySelector('.access-box').classList.remove('entrada');
                document.querySelector('.login-box').classList.add('display-none');
              }, 300);

              setTimeout(function() {
                document.querySelector('.access-box').classList.add('timeout');
              }, 3000);
              
              setTimeout(function() {
                document.querySelector('.access-box').classList.remove('active');
                document.querySelector('.access-box').classList.remove('timeout');
                document.querySelector('.access-box').innerHTML = '';
              }, 3300);
              
              setTimeout(function() {
                window.location.href = './';
              }, 3250);
              
              ";
            }
        ?>
    </script>
    <script src="./js/login.js"></script>
  </body>
</html>
