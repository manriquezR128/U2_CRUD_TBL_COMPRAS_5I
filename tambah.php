<?php
include("./config.php");

// Compruebe si se ha hecho clic en el botón de registro o no
if (isset($_POST['registrar_compra'])) {
    // recuperar datos del formulario
    $fecha = $_POST['fecha'];
    $id_proovedor = $_POST['id_proovedor'];
    $precio = $_POST['precio'];
    $metodo = $_POST['metodo'];
    $descuento = $_POST['descuento'];
    $impuestos = $_POST['impuestos'];
    $responsable = $_POST['responsable'];

    // Consulta
    $query = "INSERT INTO compras(fecha_compra, id_proveedor, total, metodo_pago, descuento, impuestos, responsable)
    VALUES('$fecha', '$id_proovedor', '$precio', '$metodo', '$descuento', '$impuestos', '$responsable')";
    $resultado = mysqli_query($conexion, $query);

    // ¿Comprueba si la consulta se guardó correctamente?
    if ($resultado)
        header('Location: ./index.php?resultado=exito');
    else
        header('Location: ./index.php?resultado=error');
} else
    die("Akses dilarang...");
