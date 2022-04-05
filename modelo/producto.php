<?php

class Producto {

    private $id;
    private $categoria_id;
    private $name;
    private $description;
    private $price;
    private $stock;
    private $fecha;
    private $img;
    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    function getId()
    {
        return $this->id;
    }

    function getName()
    {
        return $this->name;
    }

    function getCategoria_id()
    {
        return $this->categoria_id;
    }

    function getDescription()
    {
        return $this->description;
    }

    function getPrice()
    {
        return $this->price;
    }

    function getStock()
    {
        return $this->stock;
    }

    function getFecha()
    {
        return $this->fecha;
    }

    function getImg()
    {
        return $this->img;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function setName($name)
    {
        $this->name = $name;
    }

    function setCategoria_id($categoria_id)
    {
        $this->categoria_id = $categoria_id;
    }

    function setDescription($description)
    {
        $this->description = $description;
    }

    function setPrice($price)
    {
        $this->price = $price;
    }

    function setStock($stock)
    {
        $this->stock = $stock;
    }

    function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    function setImg($img)
    {
        $this->img = $img;
    }

    public function getAll(){
        $productos = $this->db->query("SELECT * FROM products ORDER BY id DESC");
        return $productos;
    }
}