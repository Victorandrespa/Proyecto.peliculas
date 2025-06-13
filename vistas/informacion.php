<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
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
    $sql = "select * from departamentos where cod_depto = " . $codigo;
    $ejecutar = mysqli_query($conexion, $sql);
    $datos = mysqli_fetch_assoc($ejecutar);

    //imprime el contenido del array que tiene el resultado
    //print_r($datos);

    ?>

    <h1 class="mt-5"><?php echo $datos['nombre_depto']; ?></h1>

    <div>
        <a href="peliculas.php" class="btn btn btn-outline-dark mb-3">Regresar</a>
    </div>


    <main class="mt-5 min-vh-100">

        <!-- Recibe datos para promedio -->

        <form action="" class="row justify-content-center">
            <div class="w-75 col-12 col-md-6 text-left">

                <label for="input_id" class="form-label"> ID:</label>
                <input type="text" class="form-control mb-3" id="input_id" value="<?php echo $codigo ?>" readonly>

                <label for="input_nombre" class="form-label"> Nombre:</label>
                <input type="text" class="form-control mb-3" id="input_nombre" value="<?php echo $datos["nombre_depto"]; ?>">


            </div>
        </form>


        <!-- Boton de agregar -->

        <div class="row justify-content-center mt-3">

            <div class="w-75 col-12 col-md-6 text-center">

                <button type="button" class="btn btn-outline-primary mb-3" id="btn_perfecto">Es # perfecto?</button>

                <div class="mb-3">
                    <label for="" class="form-label mt-2 fs-5" id="output_perfecto"></label>
                </div>
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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>

</body>

</html>