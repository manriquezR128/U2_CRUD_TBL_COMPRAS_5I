<?php
include("./config.php");

if (isset($_POST['borrar_compra'])) {
    // Agarrar el id del registro que se va a borrar
    $id_compra = $_POST['id_compra'];

    // Consulta de borrado
    $query = "DELETE FROM compras WHERE id_compras = '$id_compra'";
    $resultado = mysqli_query($conexion, $query);

    // ¿Se eliminó correctamente la consulta?
    if ($resultado) {
        header('Location: ./index.php?eliminar=exito');
    } else
        die('Location: ./index.php?eliminar=error');
} else
    die("acceso prohibido...");
