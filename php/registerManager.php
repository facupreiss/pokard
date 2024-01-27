<?php
require_once "config.php";
$db_handle = new DBController();
$email = $_POST['email'];
$clave = $_POST['clave'];
$clave2 = $_POST['clave2'];
$usuario = $_POST['usuario'];

if ($clave != $clave2) {
  header("Location: register.php?alta=error");
  exit;
}

$consulta = "INSERT INTO usuario(`email`, `clave`,`usuario`) VALUES ('$email', MD5('$clave'),'$usuario')";

if ($resultado = mysqli_query($db_handle->connectDB(), $consulta)) {
  header("Location: register.php?alta=ok");
} else {
  header("Location: register.php?alta=error");
}

?>