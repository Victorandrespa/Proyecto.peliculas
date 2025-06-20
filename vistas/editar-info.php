<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <title>Informacion</title>
</head>


<body class="container">

    <?php

    $codigo = $_POST["h_informacion"];

    if (!$codigo) {
        echo "<p class='text-danger'>No se recibió ningún dato.</p>";
        exit;
    }

    //Buscar el codigo en la base de datos en la tabla de regiones
    require_once("../main/conexion.php");
    $sql = "select * from peliculas where pelicula_id = " . $codigo;
    $ejecutar = mysqli_query($conexion, $sql);
    $datos = mysqli_fetch_assoc($ejecutar);

    //imprime el contenido del array que tiene el resultado
    //print_r($datos);

    ?>

    <h1 class="mt-5"><?php echo $datos['nombre']; ?></h1>

    <!-- top botones -->

    <div class="d-flex justify-content-between">
        <div>
            <a href="peliculas.php" class="btn btn btn-outline-dark mb-3">Regresar <i class="bi bi-arrow-90deg-left"></i></a>
        </div>
        <div class="d-flex justify-content-between">
            <!-- Agregar registro -->
            <a href="agregarForm.php" class="btn btn btn-outline-dark mb-3"><i class="bi bi-cloud-arrow-up"></i> Agregar</a>
            <!-- Editar registro / habilitar campos -->
            <button class="btn btn-outline-dark ms-1 mb-3" id="btn_editar_pelicula" data-bs-toggle="button">
                <i class="bi bi-pencil-square"></i> Editar
            </button>
            <!-- Modal para eliminar registro -->
            <button type="button" class="btn btn-outline-danger ms-1 mb-3" name="btn_eliminar_pelicula" id="btn_eliminar_pelicula" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-trash3-fill"></i>
            </button>
        </div>
    </div>


    <!-- Modal para eliminar registro -->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Seguro que desea eliminar el registro?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                <!-- Formulario para eliminar -->
                    <form action="../main/functions.php" method="post">
                        <input type="hidden" name="h_borrar_pelicula" id="h_borrar_pelicula"
                            value="<?php echo $codigo; ?>">
                        <button type="submit" name="btn_eliminar_pelicula" id="btn_eliminar_pelicula"
                            class="btn btn-outline-danger ms-1">Eliminar</button>
                    </form>

                </div>
            </div>
        </div>
    </div>



    <main class="mt-5 min-vh-100">

        <!-- container de imagen y formulario -->
        <div class="row align-items-center">

            <div class="col-md-4 d-flex align-items-center justify-content-center mb-4">
                <img src="../img/popcorn.jpg" alt="" style="max-width: 500px;">
            </div>

            <!-- Formulario para editar y presentar informacion -->

            <div class="col-md-8 align-items-center">


                <form action="../main/functions.php" method="post" id="formulario_pelicula">

                    <div class="row align-items-center justify-content-center mb-3">
                        <div class="col-md-2">
                            <label for="input_id" class="form-label">ID:</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control mb-3 me-2" id="input_id" name="input_id" value="<?php echo $codigo ?>" readonly>
                        </div>
                    </div>


                    <div class="row align-items-center justify-content-center mb-3">
                        <div class="col-md-2">
                            <label for="input_nombre" class="form-label">Nombre:</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control mb-3 me-2" id="input_nombre" name="input_nombre" value="<?php echo $datos["nombre"]; ?>" readonly>
                        </div>
                    </div>


                    <div class="row align-items-center justify-content-center mb-3">
                        <div class="col-md-2">
                            <label for="input_estreno" class="form-label">Fecha de estreno:</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control mb-3 me-2" id="input_estreno" name="input_estreno" value="<?php echo $datos["fecha_estreno"]; ?>" readonly>
                        </div>
                    </div>


                    <div class="row align-items-center justify-content-center mb-3">
                        <div class="col-md-2">
                            <label for="input_duracion" class="form-label">Duracion Minutos:</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control mb-3 me-2" id="input_duracion" name="input_duracion" value="<?php echo $datos["duracion_minutos"]; ?>" readonly>
                        </div>
                    </div>


                    <div class="row align-items-center justify-content-center mb-3">
                        <div class="col-md-2">
                            <label for="input_director" class="form-label">Director:</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control mb-3 me-2" id="input_director" name="input_director" value="<?php echo $datos["director_id"]; ?>" readonly>
                        </div>
                    </div>


                    <!-- Boton de Editar / Guardar cambios -->

                    <div class="row justify-content-center mt-3">
                        <div class="w-75 col-12 col-md-6 text-center">

                            <button type="submit" class="btn btn-outline-primary mb-3 d-none" id="btn_guardar_edicion" name="btn_guardar_edicion">Guardar Cambios</button>
                            <!-- Confirmacion de accion -->
                            <div class="mb-3">
                                <label for="" class="form-label mt-2 fs-5" id="output_resultado"></label>
                            </div>

                        </div>
                    </div>

                </form>

            </div>
        </div>




    </main>


    <footer>
        <br><br><br>
        <hr>
        <div class="text-center">
            <p>Creado por VP</p>
        </div>
    </footer>


    <script src="../main/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>

</body>

</html>