<!DOCTYPE html>
<html lang="es">
<?php include_once "head.php"; ?>

<body>
  <?php
  include_once "header.php";
  session_start();
  ?>

  <section id="login">
    <div class="container gap-5 d-flex align-items-center justify-content-center flex-column vh-100 vw-100">
      <h1 class="text-center">¡Bienvenido!</h1>
      <form action="loginManager.php" method="POST">
        <div class="row">
          <div class="col-12">
            <label for="usuario">Usuario</label>
            <input class="formInput p-2" type="text" name="usuario" id="usuario" required />
          </div>
          <div class="col-12">
            <label for="clave">Contraseña</label>
            <input class="formInput p-2" type="password" name="clave" id="clave" required />
          </div>
        </div>
        <div class="row">
          <div class="col-12 d-grid gap-2">
            <button class="btnSubmit w-100" type="submit">Enviar</button>
            <a href="register.php" class="urlLink">¿No tenés cuenta? Click acá.</a>
          </div>
          <?php
          if (isset($_GET['login'])) {
            echo "Su usuario o contraseña son incorrectos";
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