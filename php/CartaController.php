<?php
class CartaController {
    private $db_handle;
    
    public function __construct() {
        require_once "config.php";
        $this->db_handle = new DBController();
    }
    
    public function obtenerCartas() {
        $array_cartas = $this->db_handle->runQuery("SELECT * FROM carta ORDER BY id DESC");
        $cartas = array();
        if (!empty($array_cartas)) {
            foreach ($array_cartas as $clave => $valor) {
                $carta = new Carta($array_cartas[$clave]["imagen"], $array_cartas[$clave]["precio"],$array_cartas[$clave]["nombre"],$array_cartas[$clave]["id_energia"],$array_cartas[$clave]["poder"]);
                $cartas[] = $carta;
            }
        }
        return $cartas;
    }

    public function obtenerCartaXNombre($nombre) {
        $array_cartas = $this->db_handle->runQuery("SELECT * FROM carta WHERE nombre = '$nombre' ORDER BY id DESC");
        $cartas = array();
        if (!empty($array_cartas)) {
            foreach ($array_cartas as $clave => $valor) {
                $carta = new Carta($array_cartas[$clave]["imagen"], $array_cartas[$clave]["precio"],$array_cartas[$clave]["nombre"],$array_cartas[$clave]["id_energia"],$array_cartas[$clave]["poder"]);
                $cartas[] = $carta;
            }
        }
        return $cartas;
    }
}
