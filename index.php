<?php
session_start();
require_once 'cnn.php';
require_once 'cdn.html';
?>
<?php


if (isset($_POST['enviar'])) {
  # Se guarda el contendio de las cajas de texto en las variables $us y $ps

  $us = $_POST['email'];
  $password = $_POST['password'];

  # Se valida que las variables no esten vacias o nulas
  if (!empty($us) &&  !empty($password)) {
    $query = $cnnPDO->prepare('SELECT email from usuarios WHERE email =:email and password = :password ');

    //Manejo de parámetros

    $query->bindParam(':email', $us);
    $query->bindParam(':password', $password);


    //Execución del query
    $query->execute();
    //$count=$query->rowCount();
    $count = $query->rowCount();
    //Asigna los datos del registro a la variable $campo
    $campo = $query->fetch();

    if ($count) {
      if ($campo['email'] == "master" and $campo['password'] == $ps) {
        $_SESSION['email'] = $campo['email'];
        $_SESSION['password'] = $campo['password'];

        header("location:admin.php");
      } else {
        $_SESSION['email'] = $campo['email'];
        $_SESSION['password'] = $campo['password'];

        header("location:login.php");
      }
    } else {
?><div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>ERROR de datos!</strong> Verifique La Dirección de correo electrónico
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
<?php
    }
  }
}
?>



<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link href="img/logo.png" rel="icon">
  <title>Sistema</title>
</head>

<body>
  <div class="login">
    <div class="login-screen">
      <div class="app-title">
        <h1>Login Administrador</h1>
      </div>
      <form method="POST">
        <div class="login-form">
          <div class="control-group">
            <input type="text" class="login-field" value="" placeholder="usuario" id="email" name="email">
            <label class="login-field-icon fui-user" for="login-name"></label>
          </div>

          <div class="control-group">
            <input type="password" class="login-field" value="" placeholder="password" id="password" name="password">
            <label class="login-field-icon fui-lock" for="login-pass"></label>
          </div>

          <button class="btn btn-primary btn-large btn-block" id="enviar" type="submit" name="enviar">Ingresar</button>
          <br>
        </div>
      </form>
    </div>
  </div>
</body>

</html>