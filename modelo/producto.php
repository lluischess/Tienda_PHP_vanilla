<?php

class Producto {

    private $id;
    private $name;
    private $description;
    private $price;
    private $stock;
    private $fecha;
    private $img;

    public function __construct(){
        $this->db = Database::connect();
    }
}