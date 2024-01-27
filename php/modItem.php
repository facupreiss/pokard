<!DOCTYPE html>
<html lang="es">

<?php
require_once "config.php";
include_once "head.php";;
$db_handle = new DBController();
?>

<body>
	<section id="modificarItem">
		<div class="container">
			<?php
			session_start();
			include_once "header.php";

			if ($db_handle->connectDB()) {
				if (isset($_GET['idProducto'])) {
					$idCarta = $_GET['idProducto'];
					$consulta = "SELECT id,nombre,precio,imagen,id_energia,poder FROM carta WHERE id='$idCarta'";
					$consulta2 = "SELECT id, nombre FROM energia";
					$resultado2 = mysqli_query($db_handle->connectDB(), $consulta2);

					if ($resultado = mysqli_query($db_handle->connectDB(), $consulta)) {
						//GUARDA el RESULTADO DE "consulta SQL"
						$fila = mysqli_fetch_array($resultado);

						echo "<h1 class='pt-4 pb-4 text-center'>Modificar Producto</h1>";
						echo '<form method="POST" action="modItem2.php" enctype="multipart/form-data">';
						echo '<fieldset>';
						echo '<input type="number" class="d-none" name="idProducto" value="' . $fila['id'] . '"/>';
						echo '<div class="form-group">';
						echo '<label for="inputName">Nombre</label>';
						echo '<input type="text" class="form-control mb-3 formInput" id="inputName" name="nombreProducto" value="' . $fila['nombre'] . '"/>';
						echo '</div>';
						echo '<div class="form-group">';
						echo '<label for="inputPrice">Precio</label>';
						echo '<input type="number" class="form-control mb-3 formInput" id="inputPrice" name="precioProducto" value="' . $fila['precio'] . '"/>';
						echo '</div>';
						echo '<div class="form-group">';
						echo '<label for="inputPower">Poder</label>';
						echo '<input type="number" class="form-control mb-3 formInput" id="inputPower" name="poderProducto" value="' . $fila['poder'] . '"/>';
						echo '</div>';
						echo '<div class="form-group">';
						echo '<label for="inputFile">Imagen</label>';
						echo '<input type="file" class="form-control mb-3 formInput" id="inputFile" name="imagenProducto" accept="image/*"/>';
						echo '</div>';
						echo '<div class="form-group">';
						echo '<label for="inputEnergy">Tipo Energia</label>';
						echo '<select class="form-control mb-3" id="inputEnergy" name="energiaProducto" value="' . $fila['id_energia'] . '">';
						while ($fila = mysqli_fetch_array($resultado2)) {
							echo "<option value='$fila[id]'>$fila[nombre]</option>";
						}
						echo '</select>';
						echo '</div>';
						echo "<input class='btn mt-4 mb-4 buttonSubmit' type='submit' value='Enviar' />";
						echo '</fieldset>';
						echo '</form>';
					}
				}
			} else {

				echo "No se pudo modificar la carta: $nombreCarta";
			}

			?>

		</div>
	</section>
	<div class="bkgCircle" id="bkgCircleOrange"></div>
	<div class="bkgCircle" id="bkgCircleGreen"></div>
	<?php
	include_once "footer.php";
	include_once "scripts.php";
	?>
</body>

</html>