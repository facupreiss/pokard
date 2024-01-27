<?php
class DestacadasCard
{
  public $imagen;
  public $precio;
  public $nombre;
  public $id_energia;
  public $poder;

  public function __construct($imagen, $precio, $nombre, $id_energia, $poder)
  {
    $this->imagen = $imagen;
    $this->precio = $precio;
    $this->nombre = $nombre;
    $this->id_energia = $id_energia;
    $this->poder = $poder;
  }

  public function display()
  {
    echo '<div class="col">';
    echo '<div class="destacadasCard">';
    echo '<img class="imgCard" src="../img/cartas/' . $this->imagen . '" alt="">';
    echo '<div class="infoContainer">';
    echo '<div class="price">$' . $this->precio . '</div>';
?>
    <form action="carrito.php" method="post">
      <input type="hidden" name="imagen" value="<?php echo $this->imagen ?>">
      <input type="hidden" name="precio" value="<?php echo $this->precio ?>">
      <input type="hidden" name="nombre" value="<?php echo $this->nombre ?>">
      <input type="hidden" name="id_energia" value="<?php echo $this->id_energia ?>">
      <input type="hidden" name="poder" value="<?php echo $this->poder ?>">
      <input type="submit" value="Agregar al Carrito" class="btn cartBtn">
    </form>

<?php

    echo '</div>';
    echo '<img class="bkgCard" src="../img/cartas/' . $this->imagen . '" alt="">';
    echo '</div>';
    echo '</div>';
  }
}

?>