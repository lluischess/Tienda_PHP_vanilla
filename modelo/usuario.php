<?php

class Usuario
{
    private $id;
    private $nombre;
    private $apellido;
    private $email;
    private $password;
    private $rol;
    private $img;
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    function getId(){
        return $this->id;
    }

    function getNombre(){
        return $this->db->real_escape_string($this->nombre);
    }

    function getApellido(){
        return $this->db->real_escape_string($this->apellido);
    }

    function getEmail(){
        return $this->db->real_escape_string($this->email);
    }

    function getPassword(){
        return $this->db->real_escape_string($this->password);
    }

    function getRol(){
        return $this->db->real_escape_string($this->rol);
    }

    function getImg(){
        return $this->db->real_escape_string($this->img);
    }

    function setId($id){
        $this->id = $id;
    }

    function setNombre($nombre){
        $this->nombre = $nombre;
    }

    function setApellido($apellido){
        $this->apellido = $apellido;
    }

    function setEmail($email){
        $this->email = $email;
    }

    function setPassword($password){
        $this->password = $password;
    }

    function setRol($rol){
        $this->rol = $rol;
    }

    function setImg($img){
        $this->img = $img;
    }

    public function save(){
        $sql = "INSERT INTO users VALUES(null, '{$this->getNombre()}','{$this->getApellido()}','{$this->getEmail()}','{$this->getPassword()}','user','{$this->getImg()}')";
        $save = $this->db->query($sql);
    }
}
