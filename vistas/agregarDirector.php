<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <title>Agregar Director</title>
</head>

<?php

//Buscar el codigo en la base de datos en la tabla de regiones
require_once("../main/conexion.php");
if (!$conexion) {
    die("Error de conexión a la base de datos: " . mysqli_connect_error());
}
//imprime el contenido del array que tiene el resultado
//print_r($datos);

?>

<body class="container">



    <h1 class="mt-5">Nuevo Director</h1>

    <div class="d-flex justify-content-between">
        <div>
            <a href="peliculas.php" class="btn btn btn-outline-dark mb-3">Peliculas <i class="bi bi-arrow-90deg-left"></i></a>
        </div>
    </div>


    <main class="mt-5 min-vh-100">


        <!-- Formulario para agregar nuevos registros -->

        <form action="../main/functions.php" method="post">

            <div class="row align-items-center justify-content-center mb-3">
                <div class="col-md-2">
                    <label for="input_nuevo_id" class="form-label">Director ID:</label>
                </div>
                <div class="col-md-8">
                    <input type="text" class="form-control mb-3 me-2" id="input_director_id" name="input_director_id">
                </div>
            </div>


            <div class="row align-items-center justify-content-center mb-3">
                <div class="col-md-2">
                    <label for="input_nuevo_nombre" class="form-label">Nombre:</label>
                </div>
                <div class="col-md-8">
                    <input type="text" class="form-control mb-3 me-2" id="input_director_nombre" name="input_director_nombre">
                </div>
            </div>


            <div class="row align-items-center justify-content-center mb-3">
                <div class="col-md-2">
                    <label for="input_nuevo_apellido" class="form-label">Apellido:</label>
                </div>
                <div class="col-md-8">
                    <input type="text" class="form-control mb-3 me-2" id="input_director_apellido" name="input_director_apellido">
                </div>
            </div>


            <div class="row align-items-center justify-content-center mb-3">
                <div class="col-md-2">
                    <label for="input_nuevo_paisID" class="form-label">Pais ID:</label>
                </div>
                <div class="col-md-8">
                    <input type="number" class="form-control mb-3 me-2" id="input_pais_id" name="input_pais_id">
                </div>
            </div>


            <!-- Boton de agregar -->

            <div class="row align-items-center justify-content-center mt-3">

                <div class="w-75 col-12 col-md-6 text-center">

                    <button type="submit" class="btn btn-outline-primary mb-3" id="btn_agregar_director" name="btn_agregar_director">Agregar Director</button>
                    <!-- Confirmacion de accion -->
                    <div class="mb-3">
                        <label for="" class="form-label mt-2 fs-5" id="output_resultado"></label>
                    </div>
                </div>

            </div>

        </form>


    </main>


    <footer>
        <br><br><br>
        <hr>
        <div class="text-center">
            <p>Creado por VP</p>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>

</body>

</html>