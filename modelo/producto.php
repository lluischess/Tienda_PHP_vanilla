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
        $this->name = $this->db->real_escape_string($name);
    }

    function setCategoria_id($categoria_id)
    {
        $this->categoria_id = $categoria_id;
    }

    function setDescription($description)
    {
        $this->description = $this->db->real_escape_string($description);
    }

    function setPrice($price)
    {
        $this->price = $this->db->real_escape_string($price);
    }

    function setStock($stock)
    {
        $this->stock = $this->db->real_escape_string($stock);
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

    public function getOne(){
        $producto = $this->db->query("SELECT * FROM products WHERE id ={$this->getId()}");
        return $producto->fetch_object();
    }

    public function getRandom($limit){
        $productos = $this->db->query("SELECT * FROM products ORDER BY RAND() LIMIT $limit");
        return $productos;
    }

    public function getAllFromCat(){
        $productos = $this->db->query("SELECT p.*, c.name_categori FROM products p INNER JOIN categoris c ON c.id = p.category_id WHERE p.category_id = {$this->getCategoria_id()}");
        return $productos;
    }

    public function save(){
        $sql = "INSERT INTO products VALUES(NULL,'{$this->getCategoria_id()}', '{$this->getName()}','{$this->getDescription()}','{$this->getPrice()}','{$this->getStock()}',NULL,CURDATE(),'{$this->getImg()}')";
        $save = $this->db->query($sql);

        $result = false;
        if ($save){
            $result = true;
        }

        return $result;
    }

    public function delete(){
        $sql = "DELETE FROM products WHERE id={$this->id}";
        $delete = $this->db->query($sql);
        $result = false;
        if ($delete){
            $result = true;
        }

        return $result;
    }

    public function edit(){
        if ($this->getImg() != null) {
            $sql = "UPDATE products SET category_id='{$this->getCategoria_id()}', name_product='{$this->getName()}', description_product='{$this->getDescription()}', price='{$this->getPrice()}', stock='{$this->getStock()}', image='{$this->getImg()}' WHERE id={$this->id}";
        } else{
            $sql = "UPDATE products SET category_id='{$this->getCategoria_id()}', name_product='{$this->getName()}', description_product='{$this->getDescription()}', price='{$this->getPrice()}', stock='{$this->getStock()}' WHERE id={$this->id}";
        }
            $edit = $this->db->query($sql);

        $result = false;
        if ($edit){
            $result = true;
        }

        return $result;
    }
}