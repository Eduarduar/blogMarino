<?php
session_start();
include("db/Contacto.php");

if(isset($_POST["log_in"])) {
  $usuario = $_POST['usuario'];
  $contra = $_POST['contra'];

  $obj = new Contacto();
  $tipoUsuario = $obj->log_in($usuario, $contra); // Obtener el tipo de usuario (0 para administrador, 1 para usuario normal)
  header("Location: pag1.html");
}
?>

<!DOCTYPE html>
<html lang="en" >
  <head>
    <meta charset="UTF-8">
    <title>Log In</title>
    <link rel="stylesheet" href="./css/style_login.css">
    <style>
      /* Estilo para el botón */
      .boton-personalizado {
        border: none; /* Elimina el contorno */
        background: none; /* Elimina el fondo */
        cursor: pointer; /* Cambia el cursor a una mano cuando se pasa por encima */
        padding: 10px; /* Espaciado interno */
        color: #fff;
        font-size: 16px; /* Tamaño de la fuente */
      }

      /* Estilo para el botón al pasar el mouse por encima */
      .boton-personalizado:hover {
          color: blue; /* Cambia el color del texto al pasar el mouse por encima */
      }
    </style>

  </head>
  <body>
    <!-- partial:index.partial.html -->
    <div class="login-box">
      <h2>Login</h2>
      <form method="post">
        <div class="user-box">
          <input type="text" name="usuario" required="">
          <label>Username</label>
        </div>
        <div class="user-box">
          <input type="password" name="contra" required="">
          <label>Password</label>
        </div>
        <a href="#">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <button class="boton-personalizado" name="log_in">
            Submit
          </button> 
        </a>
      </form>
    </div>  
  </body>
</html>