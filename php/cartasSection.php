<section id="cartasSection">
  <div class="container">
    <h2 class="text-center mb-5">Cartas Destacadas</h2>
    <div class="row">
      <?php
      require_once "DestacadasCard.php";
      require_once "config.php";
      $db_handle = new DBController();

      $consulta = "SELECT * FROM carta ORDER BY precio DESC LIMIT 3";
      $resultado = mysqli_query($db_handle->connectDB(), $consulta);

      $cards = [];
      while ($row = mysqli_fetch_assoc($resultado)) {
        $cards[] = new DestacadasCard($row['imagen'], $row['precio'], $row['nombre'], $row['id_energia'], $row['poder'], $row['id']);
      }

      if (count($cards) % 2 == 0) {
        foreach ($cards as $card) {
          echo '<div class="col-12 col-md-6 col-lg-4 mt-4 mb-4">';
          $card->display();
          echo "</div>";
        }
      } else {
        for ($i = 0; $i < count($cards) - 1; $i++) {
          echo '<div class="col-12 col-md-6 col-lg-4 mt-4 mb-4">';
          $cards[$i]->display();
          echo "</div>";
        }

        echo '<div class="col-12 col-lg-4 mt-4 mb-4">';
        $cards[count($cards) - 1]->display();
        echo "</div>";
      }
      ?>



    </div>
  </div>
</section>