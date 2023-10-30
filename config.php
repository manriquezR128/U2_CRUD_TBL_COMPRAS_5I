<?php

$servidor = "localhost";
$usuario = "root";
$contraseña = "";
$nombre_base_de_datos = "abarrotes";

$conexion = mysqli_connect($servidor, $usuario, $contraseña, $nombre_base_de_datos);

if (!$conexion)
    die("No se pudo conectar con las bases de datos: " . mysqli_connect_error());
