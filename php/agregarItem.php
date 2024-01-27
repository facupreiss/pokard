<!DOCTYPE html>
<html lang="es">

<?php
require_once "config.php";
include_once "head.php";
$db_handle = new DBController();
?>

<body>
  <section id="agregarItem">
    <div class="container">
      <?php
      session_start();
      include_once "header.php";

      if (!isset($_SESSION['nivel']) || $_SESSION['nivel'] != 'Admin') {
        die("<h1>No tenés permisos para ingresar al panel de administración</h1>");
      }
     
      if ($db_handle->connectDB()) {
        $consulta = "SELECT id, nombre FROM energia";
        $resultado = $db_handle->runQuery($consulta);
      }

      ?>
      <h1 class="text-center pt-4 pb-4">Agregar Carta</h1>
      <div id="contenedorAgregar" class="container">
        <form method="post" action="altaItem.php" enctype="multipart/form-data">
          <fieldset>
            <div class="form-group">
              <label for="inputName">Nombre</label>
              <input type="text" class="form-control mb-3 formInput" id="inputName" name="name" required />
            </div>
            <div class="form-group">
              <label for="inputPrice">Precio</label>
              <input type="number" class="form-control mb-3 formInput" id="inputPrice" name="price" required />
            </div>
            <div class="form-group">
              <label for="inputPower">Poder</label>
              <input type="number" class="form-control mb-3 formInput" id="inputPower" name="power" required />
            </div>
            <div class="form-group">
              <label for="inputFile">Imagen</label>
              <input type="file" class="form-control mb-3 formInput" id="inputFile" name="image" accept="image/*" required />
            </div>
            <div class="form-group">
              <label for="inputEnergy">Tipo Energia</label>
              <select class="form-control mb-3" id="inputEnergy" name="energy" required>
                <?php
              foreach ($resultado as $fila) {
                echo "<option value='{$fila['id']}'>{$fila['nombre']}</option>";
              }
              
                ?>
              </select>
            </div>
            <input class='btn mt-4 mb-4 buttonSubmit' type='submit' value='Enviar' />
          </fieldset>
        </form>
      </div>

      <?php
      if (isset($_GET['error'])) {
        echo "<h3>Error</h3>";
      }
      if (isset($_GET['item'])) {
        echo "<h3>Item añadido exitosamente</h3>";
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