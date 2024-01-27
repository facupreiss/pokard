<?php
class Carta {
    public $imagen;
    public $precio;
    public $nombre;
    public $id_energia;
    public $poder;
    
    public function __construct($imagen, $precio, $nombre, $id_energia, $poder) {
        $this->imagen = $imagen;
        $this->precio = $precio;
        $this->nombre = $nombre;
        $this->id_energia = $id_energia;
        $this->poder = $poder;
    }
}
