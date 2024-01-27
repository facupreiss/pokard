<!DOCTYPE html>
<html lang="es">
<?php include_once "../php/head.php"; ?>

<body>
    <?php
    session_start();
    include_once "../php/header.php";
    require_once "config.php";
    require_once "CartaController.php";
    require_once "Carta.php";
    $db_handle = new DBController();
    $cartasController = new CartaController();
    $cartas = $cartasController->obtenerCartas();
    ?>
    <section id="cartas">
        <div class="container d-flex flex-column align-items-center">
            <h1 class="text-center mt-4 mb-4">Cartas</h1>
            <div id="searchMenu" class="row">
                <div class="col-md-6 col-sm-12">
                    <label class="mb-3" for="nombreCarta">Nombre de carta</label>
                    <input class="formInput" type="text" name="nombreCarta" id="nombreCarta" required />
                </div>
                <div class="col-md-6 col-sm-12">
                    <label class="mb-3" for="">Tipo de energía</label>
                    <div class="dropdown-center">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Seleccionar tipo de energía</button>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="#">Action</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Action two</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Action three</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-100 mt-4 d-flex justify-content-center">
            <div id="carouselExampleIndicators" class="carousel slide">
                <div class="carousel-inner">
                    <?php
                    $contador_cartas = 0;
                    foreach ($cartas as $carta) {
                        if ($contador_cartas % 8 == 0) {
                            if ($contador_cartas > 0) {
                                echo '</div></div>';
                            }
                            if ($contador_cartas == 0) {
                                echo '<div class="carousel-item active"><div class="row">';
                            } else {
                                echo '<div class="carousel-item"><div class="row">';
                            }
                        }
                    ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                            <div class="cardContainer">
                                <img class="img-fluid" src="../img/cartas/<?php echo $carta->imagen; ?>">
                                <div class="contenedor">
                                    <div class="price"><?php echo "$" . $carta->precio; ?></div>
                                    <form action="carrito.php" method="post">
                                        <input type="hidden" name="imagen" value="<?php echo $carta->imagen; ?>">
                                        <input type="hidden" name="precio" value="<?php echo $carta->precio; ?>">
                                        <input type="hidden" name="nombre" value="<?php echo $carta->nombre; ?>">
                                        <input type="hidden" name="id_energia" value="<?php echo $carta->id_energia; ?>">
                                        <input type="hidden" name="poder" value="<?php echo $carta->poder; ?>">
                                        <input type="submit" value="Agregar al Carrito" class="btn cartBtn">
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php
                        $contador_cartas++;
                    }
                    if ($contador_cartas % 8 != 0) {
                        echo '</div></div>';
                    }
                    ?>
                </div>
                <div class="carousel-indicators">
                    <?php
                    $repeticiones = ceil(count($cartas) / 8);
                    for ($i = 0; $i < $repeticiones; $i++) {
                        $slide = $i + 1;
                        $active = ($i == 0) ? 'active' : '';
                        echo "<button type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide-to='$i' class='$active' aria-label='Slide $slide'></button>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <?php
    include_once "scripts.php";
    ?>
</body>

</html>