<?php include("./config.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Belajar Dasar CRUD dengan PHP dan MySQL">
    <link rel="shortcut icon" href="logo.png" type="image/x-icon">
    <title>Abarrotes</title>

    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- material icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="./css/style.css">
</head>

<body class="bg-light">
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom" style="position: sticky !important;
    top: 0 !important; z-index : 99999 !important;">
        <div class="container-fluid container">
            <a class="navbar-brand" href="#">Abarrotes</a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto ">
                    <li class="nav-item">
                        <a class="nav-link active text-sm-start text-center" aria-current="page" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary ms-md-4 text-white" href="#">Iniciar sesion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container mt-5">
        <!-- form tambah envio -->
        <div class="card mb-5">
            <!-- <div class="card-header">
                Latihan CRUD PHP & MySQL
            </div> -->
            <!-- tambah data -->
            <div class="card-body">
                <h3 class="card-title">Tabla compras</h3>
                <p class="card-text">En esta tabla se registran las compras llevadas a cabo en nuestra teinda, de forma que se pueda dar un ticket al cliente</p>

                <!-- mostrar mensaje de éxito -->
                <?php if (isset($_GET['resultado'])) : ?>
                    <?php
                    if ($_GET['resultado'] == 'exito')
                        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Proceso exitoso!</strong> Datos agregados exitosamente!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
                    else
                        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Oops!</strong> Error al agregar datos!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
                    ?>
                <?php endif; ?>

                <!-- Grupo de inputs -->

                <form class="row g-3" action="tambah.php" method="POST">

                    <div class="col-md-8">
                        <label for="NIM" class="form-label">Fecha de compra</label>
                        <input type="date" name="fecha" class="form-control" placeholder="Fecha de compra" required>
                    </div>

                    <div class="col-md-4">
                        <label for="NIM" class="form-label">Id_proveedor</label>
                        <input type="text" name="id_proovedor" class="form-control" placeholder="Id_proovedor" required>
                    </div>

                    <div class="col-md-4">
                        <label for="NIM" class="form-label">Precio total</label>
                        <input type="text" name="precio" class="form-control" placeholder="Precio total" required>
                    </div>

                    <div class="col-8 mb-3">
                        <label for="edit_agama" class="form-label">Metodo de pago</label>
                        <select class="form-select" name="metodo" placeholder="Metodo de pago" aria-label="Default select example">
                            <option value="Efectivo">Efectivo</option>
                            <option value="Tarjeta">Tarjeta</option>
                            <option value="Transferencia">Transferencia</option>
                        </select>
                    </div>

                    <div class="col-md-8">
                        <label for="NIM" class="form-label">Descuento</label>
                        <input type="text" name="descuento" class="form-control" placeholder="Descuento" required>
                    </div>

                    <div class="col-md-4">
                        <label for="Jurusan" class="form-label">Impuestos</label>
                        <input type="text" name="impuestos" class="form-control" placeholder="Impuestos" required>
                    </div>

                    <div class="col-md-12">
                        <label for="Jurusan" class="form-label">Responsable de la compra</label>
                        <input type="text" name="responsable" class="form-control" placeholder="Responsable" required>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary" value="daftar" name="registrar_compra"><i class="fa fa-plus"></i><span class="ms-2">Registrar datos de la joya</span></button>
                    </div>
                </form>
            </div>
        </div>


        <!-- judul tabel -->
        <h5 class="mb-3">Historial de registros de joyas</h5>

        <div class="row my-3">
            <div class="col-md-3 mb-3">
                <select class="form-select" aria-label="Default select example">
                    <option selected>Limite de entradas visibles</option>
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
            <div class="col-md-3 ms-auto">
                <div class="input-group mb-3 ms-auto">
                    <input type="text" class="form-control" placeholder="Buscar..." aria-label="cari" aria-describedby="button-addon2">
                    <button class="btn btn-primary" type="button" id="button-addon2"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>


        <!-- mostrar mensaje de eliminación exitosa -->
        <?php if (isset($_GET['eliminar'])) : ?>
            <?php
            if ($_GET['eliminar'] == 'exito')
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Proceso exitoso!</strong> Datos eliminados exitosamente!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            else
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Oops!</strong> No se pudieron eliminar los datos!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            ?>
        <?php endif; ?>

        <!-- mostrar un mensaje de edición exitosa -->
        <?php if (isset($_GET['actualizar'])) : ?>
            <?php
            if ($_GET['actualizar'] == 'exito')
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Proceso exitoso!</strong> Datos actualizados exitosamente!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            else
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Oops!</strong> Los datos no se pudieron actualizar!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            ?>
        <?php endif; ?>

        <!-- tabel -->
        <div class="table-responsive mb-5 card">
            <?php
            echo "<div class='card-body'>";

            echo "<table class='table table-hover align-middle bg-white'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th scope='col' class='text-center'>Id de la compra</th>";
            echo "<th scope='col' class='text-center'>Fecha de la compra</th>";
            echo "<th scope='col' class='text-center'>Id del proveedor</th>";
            echo "<th scope='col' class='text-center'>Precio total</th>";
            echo "<th scope='col' class='text-center'>Metodo de pago</th>";
            echo "<th scope='col' class='text-center'>Descuento</th>";
            echo "<th scope='col' class='text-center'>Impuestos</th>";
            echo "<th scope='col' class='text-center'>Responsable de la compra</th>";
            echo "<th scope='col' class='text-center'>Opciones</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";



            $limite = 10;
            $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
            $inicio_limite = ($pagina > 1) ? ($pagina * $limite) - $limite : 0;

            $anterior = $pagina - 1;
            $siguiente = $pagina + 1;

            $datos = mysqli_query($conexion, "SELECT * FROM compras");
            $cantidad_de_datos = mysqli_num_rows($datos);
            $paginas_totales = ceil($cantidad_de_datos / $limite);

            $datos_mostrados = mysqli_query($conexion, "SELECT * FROM compras LIMIT $inicio_limite, $limite");
            $id_compra = $inicio_limite + 1;

            // $sql = "SELECT * FROM envio";
            // $query = mysqli_query($conexion, $sql);




            while ($compra = mysqli_fetch_array($datos_mostrados)) {
                echo "<tr>";
                echo "<td style='display:none'>" . $compra['id_compras'] . "</td>";
                echo "<td class='text-center'>" . $id_compra++ . "</td>";
                echo "<td class='text-center'>" . $compra['fecha_compra'] . "</td>";
                echo "<td class='text-center'>" . $compra['id_proveedor'] . "</td>";
                echo "<td class='text-center'>" . $compra['total'] . "$</td>";
                echo "<td class='text-center'>" . $compra['metodo_pago'] . "</td>";
                echo "<td class='text-center'>" . $compra['descuento'] . "%</td>";
                echo "<td class='text-center'>" . $compra['impuestos'] . "%</td>";
                echo "<td class='text-center'>" . $compra['responsable'] . "</td>";

                echo "<td class='text-center'>";

                echo "<button type='button' class='btn btn-primary editButton pad m-1'><span class='material-icons align-middle'>edit</span></button>";

                // tombol hapus
                echo "
                            <!-- Button trigger modal -->
                            <button type='button' class='btn btn-danger deleteButton pad m-1'><span class='material-icons align-middle'>delete</span></button>";
                echo "</td>";

                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
            if ($cantidad_de_datos == 0) {
                echo "<p class='text-center'>No hay datos disponibles en esta tabla.</p>";
            } else {
                echo "<p>Total $cantidad_de_datos entradas</p>";
            }

            echo "</div>";
            ?>
        </div>

        <!-- pagination -->
        <nav class="mt-5 mb-5">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" <?php echo ($pagina > 1) ? "href='?pagina=$anterior'" : "" ?>><i class="fa fa-chevron-left"></i></a>
                </li>
                <?php
                for ($x = 1; $x <= $paginas_totales; $x++) {
                ?>
                    <li class="page-item"><a class="page-link" href="?pagina=<?php echo $x ?>"><?php echo $x; ?></a></li>
                <?php
                }
                ?>
                <li class="page-item">
                    <a class="page-link" <?php echo ($pagina < $paginas_totales) ? "href='?pagina=$siguiente'" : "" ?>><i class="fa fa-chevron-right"></i></a>
                </li>
            </ul>
        </nav>

        <!-- Modal de editar datos -->
        <div class='modal fade' style="top:58px !important;" id='modal_para_editar' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog' style="margin-bottom:100px !important;">
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Editar datos de envio</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>

                    <?php
                    $query = "SELECT * FROM compras";
                    $resultado = mysqli_query($conexion, $query);
                    $provedor = mysqli_fetch_array($resultado);
                    ?>

<!-- ------------------------------------------------------------------------------------------------------------------ -->
                    
                    <form action='edit.php' method='POST'>
                        <div class='modal-body text-start'>
                            <input type='hidden' name='id_compras' id='edit_0'>

                            <div class="col-12 mb-3">
                                <label for="edit_NIM" class="form-label">Fecha de compra</label>
                                <input type="date" name="edit_fecha" id="edit_2" class="form-control" placeholder="Fecha de compra" required>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="edit_NIM" class="form-label">Id_proveedor</label>
                                <input type="text" name="edit_id" id="edit_3" class="form-control" placeholder="Id_proveedor" required>
                            </div>
                            
                            <div class="col-12 mb-3">
                                <label for="edit_NIM" class="form-label">Precio total</label>
                                <input type="text" name="edit_precio" id="edit_4" class="form-control" placeholder="Precio total" required>
                            </div>

                            <div class="col-8 mb-3">
                                <label for="edit_agama" class="form-label">Metodo de pago</label>
                                <select class="form-select" name="edit_metodo" id="edit_5" placeholder="Metodo de pago" aria-label="Default select example">
                                    <option value="Efectivo">Efectivo</option>
                                    <option value="Tarjeta">Tarjeta</option>
                                    <option value="Transferencia">Transferencia</option>
                                </select>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="edit_NIM" class="form-label">Descuento</label>
                                <input type="text" name="edit_descuento" id="edit_6" class="form-control" placeholder="Descuento" required>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="edit_NIM" class="form-label">Impuestos</label>
                                <input type="text" name="edit_impuesto" id="edit_7" class="form-control" placeholder="Impuestos" required>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="edit_ipk" class="form-label">Responsable de la compra</label>
                                <input type="text" name="edit_responsable" id="edit_8" class=" form-control" placeholder="Responsable de la compra" required>
                            </div>

                        </div>

                        <div class='modal-footer'>
                            <button type='submit' name='editar_compra' class='btn btn-primary'>Editar</button>
                        </div>

                    </form>

<!-- ------------------------------------------------------------------------------------------------------------------ -->

                </div>
            </div>
        </div>


        <!-- Modal Delete-->
        <div class='modal fade' style="top:58px !important;" id='modal_para_borrar' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Confirmación</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>


                    <form action='hapus.php' method='POST'>

                        <div class='modal-body text-start'>
                            <input type='hidden' name='id_compra' id='id_para_borrar'>
                            <p>¿Estás seguro de que deseas eliminar estos datos?</p>
                        </div>

                        <div class='modal-footer'>
                            <button type='submit' name='borrar_compra' class='btn btn-primary'>Eliminar</button>
                        </div>

                    </form>


                </div>
            </div>
        </div>


        <!-- tutup container -->
    </div>


    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Javascript bule with popper bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- edit function -->
    <script>
        $(document).ready(function() {
            $('.editButton').on('click', function() {
                $('#modal_para_editar').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);
                $('#edit_0').val(data[0]);
                // gak dipake, karena cuma increment number
                // $('#no').val(data[1]);
                $('#edit_2').val(data[2]);
                $('#edit_3').val(data[3]);
                $('#edit_4').val(data[4]);
                $('#edit_5').val(data[5]);
                $('#edit_6').val(data[6]);
                $('#edit_7').val(data[7]);
                $('#edit_8').val(data[8]);
            });
        });
    </script>

    <!-- delete function -->
    <script>
        $(document).ready(function() {
            $('.deleteButton').on('click', function() {
                $('#modal_para_borrar').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);
                $('#id_para_borrar').val(data[0]);
            });
        });
    </script>

    <script>
        function clicking() {
            window.location.href = './index.php';
        }
    </script>
</body>

</html>