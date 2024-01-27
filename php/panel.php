<!DOCTYPE html>
<html lang="en">
<?php include_once "head.php"; ?>

<body>
	<?php
	session_start();
	include_once "header.php";
	require_once "config.php";
	$db_handle = new DBController();
	

	//hacer una tabla que muestre categorias modificar borrar
	echo "<section id='panel'>";
	echo "<div class='container'>";

	if (isset($_SESSION['nivel']) && $_SESSION['nivel'] == 'usuario' || !isset($_SESSION['nivel'])) {
		echo "<h1 class='mb-4'>No tienes permisos para acceder a esta sección</h1>";
	} else {
		if ($db_handle->connectDB()) {
			//servidor, usuario administrador, contraseña, base de datos 

			echo "<h1 class='mb-4 mt-4'>Listado Cartas - ABM</h1>";
			echo "<a id='addCardBtn' class='mb-4' href='agregarItem.php'> + Agregar Carta</a>";

			//guarda los datos de conexion
			$consulta = "SELECT id,nombre,precio,imagen,id_energia,poder FROM carta ORDER BY id DESC";

			//guarda la "consulta SQL"

			if ($resultado = mysqli_query($db_handle->connectDB(), $consulta)) {
				//GUARDA el RESULTADO DE "consulta SQL"
				echo '<table class="table table-custom">';
				echo '<thead>';
				echo '<tr>';
				echo '<th scope="col">#</th>';
				echo '<th scope="col">Producto</th>';
				echo '<th scope="col">Precio</th>';
				echo '<th scope="col">Editar</th>';
				echo '</tr>';
				echo '</thead>';
				echo '<tbody>';

				$contador = 1;
				while ($fila = mysqli_fetch_array($resultado)) {
					echo '<tr>';
					echo '<th scope="row">' . $contador . '</th>';
					echo '<td>' . $fila['nombre'] . '</td>';
					echo '<td>' . $fila['precio'] . '</td>';
					echo "<td><a href=modItem.php?idProducto=$fila[id]><img src='../img/editar.svg' alt=''></a>
					
					<a href=borrarItem.php?idProducto=$fila[id]&nombreProducto=$fila[nombre]><img src='../img/eliminar.svg' alt=''></a></td>";
					echo '</tr>';
					$contador++;
				}
				echo '</tbody>';
				echo '</table>';
			}
		} else {
			echo "No hay conexion";
		}
	}

	?>
	</div>
	</section>

	<?php
	include_once "footer.php";
	include_once "scripts.php";
	?>
</body>

</html>