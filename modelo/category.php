<?php

class Category
{

    private $id;
    private $nombre;
    private $db;


    public function __construct()
    {
        $this->db = Database::Connect();
    }

    function getId()
    {
        return $this->id;
    }

    function getNombre()
    {
        return $this->nombre;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function setNombre($nombre)
    {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    public function getAllCategoris()
    {
        $sql = "SELECT * FROM categoris";

        $categorias = $this->db->query($sql);

        return $categorias;
    }

    public function getOne(){
        $sql = "SELECT * FROM categoris WHERE id={$this->getId()}";

        $categoria = $this->db->query($sql);

        return $categoria;
    }

    public function save(){
        $sql = "INSERT INTO categoris VALUES(NULL, '{$this->getNombre()}')";
        $save = $this->db->query($sql);

        $result = false;
        if ($save){
            $result = true;
        }

        return $result;
    }
}
