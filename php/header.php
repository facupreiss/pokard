<?php
$navItems = [
  [
    "href" => "index.php",
    "text" => "Inicio",
  ],
  [
    "href" => "cartas.php",
    "text" => "Cartas",
  ],
  [
    "href" => "carrito.php",
    "text" => "Carrito",
  ],
  [
    "href" => "panel.php",
    "text" => "Panel",
  ],
  [
    "href" => "login.php",
    "text" => "Iniciar Sesión",
    "class" => "loginBtn ps-2 text-center",
  ],
];


if (isset($_SESSION['usuario'])) {
  for ($i = 0; $i < count($navItems); $i++) {
    if ($navItems[$i]['text'] == 'Iniciar Sesión') {
      $navItems[$i]['text'] = 'Cerrar Sesión';
      $navItems[$i]['href'] = 'logout.php';
      $navItems[$i]['class'] = 'logoutBtn ps-2 text-center';
    }
  }
}


if (!isset($_SESSION['nivel']) || $_SESSION['nivel'] == 'usuario' && isset($_SESSION['nivel'])) {
  foreach ($navItems as $key => $item) {
    if ($item['text'] == 'Panel') {
      unset($navItems[$key]);
      $navItems = array_values($navItems);
      break;
    }
  }
}
?>

<header>
  <nav class="p-0 navbar navbar-expand-lg fixed-top">
    <div class="container-fluid p-0">
      <div class="navbar-subContainer p-1 p-lg-0">
        <a class="navbar-brand position-absolute" href="index.php">
          <span>Pokard</span><img src="../img/favicon.svg" alt="Icono de Pokard" />
        </a>
        <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <div class="hamburger-icon">
            <span class="line"></span>
            <span class="line"></span>
          </div>
        </button>
      </div>

      <div class="collapse navbar-collapse d-lg-flex justify-content-center" id="navbarNavDropdown">
        <ul class="navbar-nav d-flex gap-2 p-lg-0 p-4">

          <?php
          foreach ($navItems as $item) {
            if ($item["text"] == "Iniciar Sesión") {
              echo "<li>";
              echo '<a class="nav-link loginBtn ps-2 text-center';
              if (isset($item["class"])) {
                echo " " . $item["class"];
              }
              echo '" href="' . $item["href"] . '">' . $item["text"] . "</a>";
              echo "</li>";
            } else {
              echo '<li class="nav-item ps-lg-0 ps-2">';
              echo '<a class="nav-link';
              if (isset($item["class"])) {
                echo " " . $item["class"];
              }
              echo '" href="' . $item["href"] . '">' . $item["text"] . "</a>";
              echo "</li>";
            }
          } ?>
        </ul>
      </div>
    </div>
  </nav>
</header>