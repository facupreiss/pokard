<!DOCTYPE html>
<html lang="es">

<?php include_once "head.php"; ?>

<body>
  <?php
  session_start();
  include_once "header.php";
  require_once "config.php";
  $db_handle = new DBController();
  
  // Verificar si se ha enviado información de una carta para agregar al carrito
  if (isset($_POST['imagen'])) {
    $imagen = $_POST['imagen'];
    $precio = $_POST['precio'];
    $nombre = $_POST['nombre'];
    $id_energia = $_POST['id_energia'];
    $poder = $_POST['poder'];

    // Verificar si la carta ya está en el carrito
    if (isset($_SESSION['carrito'][$imagen])) {
      // Si la carta ya está en el carrito, aumentar su cantidad
      $_SESSION['carrito'][$imagen]['cantidad']++;
    } else {
      // Si la carta no está en el carrito, agregarla con cantidad 1
      $_SESSION['carrito'][$imagen] = array(
        'precio' => $precio,
        'nombre' => $nombre,
        'id_energia' => $id_energia,
        'poder' => $poder,
        'cantidad' => 1
      );
    }

    // Redirigir al usuario a carrito.php
    header('Location: carrito.php');
    exit;
  }

  // Verificar si se ha enviado información de una carta para eliminar del carrito
  if (isset($_POST['eliminar_imagen'])) {
    $eliminar_imagen = $_POST['eliminar_imagen'];

    // Verificar si la carta todavía está en el carrito
    if (isset($_SESSION['carrito'][$eliminar_imagen])) {
      // Si la carta todavía está en el carrito, verificar si hay más de una carta igual
      if ($_SESSION['carrito'][$eliminar_imagen]['cantidad'] > 1) {
        // Si hay más de una carta igual en el carrito, disminuir su cantidad
        $_SESSION['carrito'][$eliminar_imagen]['cantidad']--;
      } else {
        // Si solo hay una carta igual en el carrito, eliminarla completamente
        unset($_SESSION['carrito'][$eliminar_imagen]);
      }
    } else {
      // Si la carta ya no está en el carrito, mostrar un mensaje al usuario
      echo "<p>La carta ya ha sido eliminada del carrito.</p>";
    }

    // Redirigir al usuario a carrito.php
    header('Location: carrito.php');
    exit;
  }

  $consulta = "SELECT * FROM energia";
  $resultado = mysqli_query($db_handle->connectDB(), $consulta);
  


  $energias = array();
 foreach($resultado as $fila){
    $id_energia = $fila['id'];
    $tipo = $fila['nombre'];
    $src = $fila['imagen'];
    $energias[$id_energia] = array('nombre' => $tipo, 'imagen' => $src);
  }

  ?>

  <section id="carrito">
    <div class="container">
      <?php
      // Mostrar el contenido del carrito
      if (isset($_SESSION['carrito'])) {
        echo '<h1 class="text-center pt-4 pb-4">Carrito</h1>';
        foreach ($_SESSION['carrito'] as $imagen => $carta) {
          echo '<div class="container cartItem mb-4">';
          echo '<div class="d-flex justify-content-end">';
          echo '<form action="carrito.php" method="post">';
          echo '<input type="hidden" name="eliminar_imagen" value="' . $imagen . '">';
          echo '<input type="submit" value="X Eliminar del carrito" class="eliminarBtn">';
          echo '</form>';
          echo '</div>';
          echo '<div class="row p-4 pt-2">';
          echo '<div class="col-md-3 d-flex justify-content-center">';
          echo "<img class='imgCarta' src='../img/cartas/$imagen' alt='$imagen'>";
          echo '</div>';
          echo '<div class="col-md-9 p-0">';
          echo '<div class="container">';
          echo '<div class="row">';
          echo '<div class="col-md-8 d-flex gap-2  justify-content-center justify-content-md-start">';

          $id_energia = $carta['id_energia'];
          echo "<img class='energia' src='../img/energias/{$energias[$id_energia]['imagen']}' alt=''>";
          echo "<span class='nombreCarta'>{$carta['nombre']}</span>";
          echo '</div>';
          echo '<div class="col-md-4 d-flex justify-content-center justify-content-md-end align-items-center">';
          echo "<span class='poder'><span class='poderSize'>PS</span> {$carta['poder']}</span>";
          echo '</div>';

          // Mostrar la cantidad de cartas iguales en el carrito
          echo "<span>Cantidad: {$carta['cantidad']}</span>";

          // Calcular y mostrar el precio total de las cartas iguales en el carrito
          $precio_total = $carta['precio'] * $carta['cantidad'];
          echo "<span>Precio total: \$$precio_total</span>";

          echo "<span>Tipo de energía: {$energias[$id_energia]['nombre']}</span>";
          echo "<div class='comprarContainer'>";
          echo '<input type="submit" value="Comprar" class="comprarBtn">';
          echo "</div>";
          echo "</div>";
          echo "</div>";
          echo "</div>";
          echo "</div>";
          echo "</div>";
        }
      } else {
        echo "<p>El carrito está vacío.</p>";
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