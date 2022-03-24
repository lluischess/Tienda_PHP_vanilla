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
        $this->nombre = $nombre;
    }

    public function getAllCategoris()
    {
        $sql = "SELECT * FROM categoris";

        $categorias = $this->db->query($sql);

        return $categorias;
    }
}
