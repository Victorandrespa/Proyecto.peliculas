
<?php

//Variables
$servidor = "localhost";
$usuario = "root";
$password = ""; //usuario root no tiene contraseña
$baseDatos = "fs2025_peliculas";

//conexion con MySQL
$conexion = mysqli_connect("$servidor", "$usuario","$password","$baseDatos");

if (!$conexion) {
    die ("Error en conexion". mysqli_connect_error());
}else {
    echo "";
}

?>