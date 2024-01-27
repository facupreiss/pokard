<!DOCTYPE html>
<html lang="es">

<?php include_once "head.php"; ?>

<body>
	<section id="eliminarItem">
		<div class="container">
			<?php
			session_start();
			include_once "header.php";
			require_once "config.php";
			$db_handle = new DBController();

			if ($db_handle->connectDB()) {

				if (isset($_GET['idProducto'])) {
					$idCarta = $_GET['idProducto'];
					$nombreCarta = $_GET['nombreProducto'];

					$consulta = "DELETE FROM carta WHERE id='$idCarta'";

					$consultaImagen = "SELECT imagen FROM carta WHERE id='$idCarta'";
					$resultadoImagen = mysqli_query($db_handle->connectDB(), $consultaImagen);
					$filaImagen = mysqli_fetch_array($resultadoImagen);
					$imagenCarta = $filaImagen['imagen'];

					if ($resultado = mysqli_query($db_handle->connectDB(), $consulta)) {
						$directorioImagen = "../img/cartas/";
						$rutaImagen = $directorioImagen . $imagenCarta;
						if (file_exists($rutaImagen)) {
							unlink($rutaImagen);
						}
						echo "<h1>La carta $nombreCarta fue eliminada correctamente.</h1>";
						if (isset($_SESSION['carrito'][$imagenCarta])) {
							unset($_SESSION['carrito'][$imagenCarta]);
						}
  
					}
				}
			} else {
				echo "No se pudo ELIMINAR $nombreCarta";
			}
			?>
		</div>
	</section>
</body>

</html>