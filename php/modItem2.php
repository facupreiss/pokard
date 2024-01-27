<!DOCTYPE html>
<html lang="es">

<?php
include_once "head.php";
require_once "config.php";
$db_handle = new DBController();
?>

<body>
	<section id="modificadoItem">
		<div class="container">
			<?php
			include_once "header.php";

			if ($db_handle->connectDB()) {
				if (isset($_POST['idProducto'])) {
					$idCarta = $_POST['idProducto'];

					// Obtener los valores antiguos de la carta
					$consulta = "SELECT nombre, precio, imagen, id_energia, poder FROM carta WHERE id='$idCarta'";
					$resultado = mysqli_query($db_handle->connectDB(), $consulta);
					$fila = mysqli_fetch_array($resultado);
					$nombreAnterior = $fila['nombre'];
					$precioAnterior = $fila['precio'];
					$imagenAnterior = $fila['imagen'];
					$idEnergiaAnterior = $fila['id_energia'];
					$poderAnterior = $fila['poder'];

					// Verificar si se ha enviado un nuevo nombre
					if (isset($_POST['nombreProducto']) && $_POST['nombreProducto'] != '') {
						// Si se ha enviado un nuevo nombre, utilizarlo
						$nombreCarta = $_POST['nombreProducto'];
					} else {
						// Si no se ha enviado un nuevo nombre, conservar el nombre anterior
						$nombreCarta = $nombreAnterior;
					}

					// Verificar si se ha enviado un nuevo precio
					if (isset($_POST['precioProducto']) && $_POST['precioProducto'] != '') {
						// Si se ha enviado un nuevo precio, utilizarlo
						$precioCarta = $_POST['precioProducto'];
					} else {
						// Si no se ha enviado un nuevo precio, conservar el precio anterior
						$precioCarta = $precioAnterior;
					}

					// Verificar si se ha enviado una nueva imagen
					if (isset($_FILES['imagenProducto']) && $_FILES['imagenProducto']['error'] == UPLOAD_ERR_OK) {
						// Si se ha enviado una nueva imagen, utilizarla
						$imagenCarta = basename($_FILES["imagenProducto"]["name"]);
						move_uploaded_file($_FILES["imagenProducto"]["tmp_name"], "../img/cartas/$imagenCarta");
					} else {
						// Si no se ha enviado una nueva imagen, conservar la imagen anterior
						$imagenCarta = $imagenAnterior;
					}

					// Verificar si se ha enviado un nuevo tipo de energía
					if (isset($_POST['energiaProducto']) && $_POST['energiaProducto'] != '') {
						// Si se ha enviado un nuevo tipo de energía, utilizarlo
						$energiaCarta = $_POST['energiaProducto'];
					} else {
						// Si no se ha enviado un nuevo tipo de energía, conservar el tipo de energía anterior
						$energiaCarta = $idEnergiaAnterior;
					}

					// Verificar si se ha enviado un nuevo poder
					if (isset($_POST['poderProducto']) && $_POST['poderProducto'] != '') {
						// Si se ha enviado un nuevo poder, utilizarlo
						$poderCarta = $_POST['poderProducto'];
					} else {
						// Si no se ha enviado un nuevo poder, conservar el poder anterior
						$poderCarta = $poderAnterior;
					}

					// Actualizar la información de la carta en la base de datos
					mysqli_query($db_handle->connectDB(), "UPDATE carta SET nombre='$nombreCarta', precio='$precioCarta', imagen='$imagenCarta', id_energia='$energiaCarta', poder='$poderCarta' WHERE id='$idCarta'");
				}

				if ($resultado = mysqli_query($db_handle->connectDB(), $consulta)) {
					//GUARDA el RESULTADO DE "consulta SQL"
					echo "<h1>La carta se pudo modificar correctamente. </h1>";
				}
			} else {
				echo "No se pudo modificar la carta.";
			}
			?>
		</div>
	</section>
</body>

</html>