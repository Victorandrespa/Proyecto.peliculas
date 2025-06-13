<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <title>Peliculas</title>
</head>

<body class="container mt-4">

    <main class="min-vh-100">

        <h1 class="mt-2">Peliculas</h1>

        <div>
            <a href="../index.html" class="btn btn btn-outline-dark mb-3">Menu</a>
        </div>
        <br>

        <div class="row justify-content-left d-flex flex-wrap">

            <!-- Lectura de base de datos php -->
            <?php
            require_once("../main/conexion.php");
            $sql = "select * from departamentos";
            $ejecutar = mysqli_query($conexion, $sql);

            while ($resultado = mysqli_fetch_assoc($ejecutar)) {
            ?>

                <!-- card para mostrar perliculas -->
                <div class="card m-2 p-1" style="width: 18rem;">
                    <!-- Imagen -->
                    <img src="../img/popcorn.jpg" class="card-img-top" alt="...">

                    <!-- Contenido tarjeta -->
                    <div class="card-body">

                        <!-- Nombre pelicula y datos -->
                        <h5 class="card-title"><?= $resultado['nombre']; ?></h5>
                        <p class="card-text">
                            Id:<?= $resultado['nombre_depto']; ?>
                            <br>
                            <?= $resultado['nombre_depto']; ?>
                            <br>
                            Estreno: <?= $resultado['nombre_depto']; ?>
                            <br>
                            Duracion: <?= $resultado['nombre_depto'] ?>
                            <br>
                            Director: <?= $resultado['nombre_depto'] ?>

                        </p>
                        
                        <!-- Boton de mas informacion -->

                        <form action="informacion.php" method="post">
                            <!-- Input oculto -->
                            <input type="hidden" name="h_informacion" id="h_informacion" value="<?php echo $resultado['cod_depto']; ?>">
                            <!-- Botón que activa el envío -->
                            <div class="text-center">
                                <button type="submit" class="btn btn btn-outline-dark mb-3" style="width: 10rem;">Informacion</button>
                            </div>
                        </form>

                    </div><!-- Fin contenido -->
                </div><!-- Fin card -->
            <?php
            } // Fin while
            ?>
        </div><!-- row -->








    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>
</body>

</html>