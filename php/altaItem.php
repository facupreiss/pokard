<?php
require_once "config.php";
$db_handle = new DBController();
if ($db_handle->connectDB()) {
  if (isset($_POST["name"]) && isset($_POST["price"])) {
    $nombre = $_POST["name"];
    $precio = $_POST["price"];
    $poder = $_POST["power"];
    $energia = $_POST["energy"];
    $img = $_FILES["image"]["name"];
    $img_tmp = $_FILES["image"]["tmp_name"];

    // Ruta de la carpeta donde se guardarán las imágenes
    $carpeta_destino = "../img/cartas/";

    // Movemos la imagen del directorio temporal al directorio definitivo
    if (move_uploaded_file($img_tmp, $carpeta_destino . $img)) {
      // La imagen se ha cargado correctamente, ahora realizamos la inserción en la base de datos
      $consulta = "INSERT INTO carta (nombre, precio, poder, descripcion, imagen, id_energia) VALUES ('$nombre', '$precio', '$poder','', '$img', '$energia')";
    if ($resultado = mysqli_query($db_handle->connectDB(), $consulta)) {
        header("Location: panel.php?item=ok");
      } else {
        header("Location: panel.php?error=error");
      }
    } else {
      // Si ocurrió un error al mover la imagen, redirecciona con un mensaje de error
      header("Location: panel.php?error=error");
    }
  }
}
