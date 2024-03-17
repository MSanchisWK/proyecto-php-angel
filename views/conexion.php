<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '2001_1973_1974');
define('DB_NAME', 'proyecto');
 
/* Attempt to connect to MySQL database */
$conexion = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($conexion === false){
    die("ERROR: Conexion fallida. " . mysqli_connect_error());
}
?>