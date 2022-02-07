<?php

class dataBase {

    public static function connect(){
        $db = new mysqli('localhost','root','','store_db');
        $db->query("SET NAMES 'utf8'");
        return $db;
    }
}