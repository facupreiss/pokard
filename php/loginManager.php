<?php
session_start();

require_once "config.php";
$db_handle = new DBController();
$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

$consulta = "SELECT usuario, email, id, nivel FROM usuario WHERE usuario = '$usuario' AND clave = MD5('$clave') LIMIT 1";

$f = mysqli_query($db_handle->connectDB(), $consulta);
$a = mysqli_fetch_assoc($f);
if ($a == NULL) {
  header("Location: login.php?login=error");
} else {
  $_SESSION = $a;
  header("Location: index.php");
}
?>