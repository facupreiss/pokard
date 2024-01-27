<!DOCTYPE html>
<html lang="es">
<?php include_once "head.php";
session_start();
?>

<body>

  <?php
  $sections = [
    "header" => "header.php",
    "inicioSection" => "inicioSection.php",
    "cartasSection" => "cartasSection.php",
    "contactoSection" => "contactoSection.php",
    "footer" => "footer.php",
  ];

  foreach ($sections as $section) {
    include_once $section;
  }
  include_once "scripts.php";
  ?>

  <script src="../js/form.js"></script>
</body>

</html>