<?php

$host = "localhost"; 
$dbname = "proyecto";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("SET NAMES utf8");
    return $pdo;
} catch (PDOException $e) {
    die("Error de conexión a la base de datos: " . $e->getMessage());
}