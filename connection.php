<?php
class Connection {

private $host = "localhost"; 
private $dbname = "proyecto";
private $username = "root";
private $password = "";

public function __construct() {}

function getConnection() {
    try {
        $db = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->exec("SET NAMES utf8");
        return $db;
    } catch (PDOException $e) {
        die("Error de conexión a la base de datos: " . $e->getMessage());
    }
}

}