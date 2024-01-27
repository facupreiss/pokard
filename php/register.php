<!DOCTYPE html>
<html lang="es">
<?php include_once "head.php"; ?>

<body>
  <?php
  include_once "header.php";
  ?>

  <section id="register">
    <div class="container gap-5 d-flex align-items-center justify-content-center flex-column vh-100 vw-100">
      <h1 class="text-center">Crea tu cuenta</h1>
      <form action="registerManager.php" method="POST">
        <div class="row">
          <div class="col-12">
            <label for="usuario">Usuario</label>
            <input class="formInput p-2" type="text" name="usuario" id="usuario" required />
          </div>
          <div class="col-12">
            <label for="email">Correo electrónico</label>
            <input class="formInput p-2" type="text" name="email" id="email" required />
          </div>
          <div class="col-12">
            <label for="clave">Contraseña</label>
            <input class="formInput p-2" type="password" name="clave" id="clave" required />
          </div>
          <div class="col-12">
            <label for="clave2">Confirmar contraseña</label>
            <input class="formInput p-2" type="password" name="clave2" id="clave2" required />
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button class="btnSubmit w-100" type="submit">Confirmar</button>
          </div>
          <?php
          if (isset($_GET['alta'])) {
            echo "Registro exitoso";
          }

          if (isset($_GET['error'])) {
            echo "Error.";
          }
          ?>
        </div>
      </form>
    </div>
  </section>

  <div class="bkgCircle" id="bkgCircleOrange"></div>
  <div class="bkgCircle" id="bkgCircleGreen"></div>

  <?php include_once "scripts.php"; ?>

</body>

</html>