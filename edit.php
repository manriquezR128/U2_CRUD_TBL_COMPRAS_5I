<?php
include("./config.php");

// Compruebe si se ha hecho clic en el botón de editar o no
if (isset($_POST['editar_compra'])) {
    // recuperar datos del formulario
    $id_compras = $_POST['id_compras'];
    $edit_fecha = $_POST['edit_fecha'];
    $edit_id = $_POST['edit_id'];
    $edit_precio = $_POST['edit_precio'];
    $edit_metodo = $_POST['edit_metodo'];
    $edit_descuento = $_POST['edit_descuento'];
    $edit_impuesto = $_POST['edit_impuesto'];
    $edit_responsable = $_POST['edit_responsable'];


    // Consulta
    $query = "UPDATE compras SET fecha_compra='$edit_fecha', id_proveedor='$edit_id', total='$edit_precio', metodo_pago='$edit_metodo', descuento='$edit_descuento', impuestos='$edit_impuesto', responsable='$edit_responsable' WHERE id_compras = '$id_compras'";
    $resultado = mysqli_query($conexion, $query);

    // ¿Comprueba si la consulta se guardó correctamente?
    if ($resultado)
        header('Location: ./index.php?actualizar=exito');
    else
        header('Location: ./index.php?actualizar=error');
} else
    die("Acceso prohibido...");
