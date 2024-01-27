<section id="inicioSection">
  <div class="container">
    <div class="titleContainer">
      <h1>
        <span id="highlight1">Bienvenido a Pokard</span>: donde los
        entrenadores se convierten en
        <span id="highlight2">coleccionistas</span>.
      </h1>
      <div class="separator"></div>
    </div>

    <?php
    require_once "InicioCard.php";

    $bulbasaur = new InicioCard(
      "bulbasaurCard",
      "../img/bulbasaur.svg",
      "",
      "bulbasaur",
      "Bulbasaur"
    );
    $charmander = new InicioCard(
      "charmanderCard",
      "../img/charmander.svg",
      "",
      "charmander",
      "Charmander"
    );
    $pikachu = new InicioCard(
      "pikachuCard",
      "../img/pikachu.svg",
      "",
      "pikachu",
      "Pikachu"
    );
    $squirtle = new InicioCard(
      "squirtleCard",
      "../img/squirtle.svg",
      "",
      "squirtle",
      "Squirtle"
    );

    echo '<div class="pokemonsContainer d-flex justify-content-center">';
    $bulbasaur->display();
    $charmander->display();
    $pikachu->display();
    $squirtle->display();
    echo "</div>";
    ?>
  </div>
</section>