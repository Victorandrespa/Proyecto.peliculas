<?php

// Utilizar region 
require_once("conexion.php");



// Porcesos Eliminar ----------------------------

if (isset($_POST["btn_eliminar_pelicula"])) {
    $codigo = $_POST["h_borrar_pelicula"];
    $sql = "delete from peliculas where pelicula_id = " . $codigo;

    try {
        $ejecutar = mysqli_query($conexion, $sql);
        echo "<br>Datos almacenados";
        header("Location:../vistas/peliculas.php");
        exit;
    } catch (Exception $th) {
        echo "<br>Datos no fueron guardados<br>" . $th;
    }
}


// Procesos Insertar ----------------------------

//Agregar Pelicula

if (isset($_POST["btn_agregar_pelicula"])) {

    //recibo datos de formulario
    $id = $_POST["input_nuevo_id"];
    $nombre = $_POST["input_nuevo_nombre"];
    $estreno = $_POST["input_nuevo_estreno"];
    $duracion = $_POST["input_nuevo_duracion"];
    $director = $_POST["input_nuevo_director"];

    require_once("conexion.php");
    $sql = "insert into peliculas (pelicula_id, nombre, fecha_estreno, duracion_minutos, director_id) 
    values (" . $id . ",
    '" . $nombre . "',
    '" . $estreno . "',
    '" . $duracion . "',
    '" . $director . "');";

    try {
        $ejecutar = mysqli_query($conexion, $sql);
         echo "<script>
                alert('Registro agregado correctamente.');
                window.location.href = '../vistas/peliculas.php';
            </script>";
        exit;
    } catch (Exception $th) {
        echo "<br>Datos no fueron guardados<br>" . $th;
    }
}

//Agregar Pais

if (isset($_POST["btn_agregar_pais"])) {

    //recibo datos de formulario
    $id = $_POST["input_pais_id"];
    $nombre = $_POST["input_pais_nombre"];


    require_once("conexion.php");
    $sql = "insert into paises (pais_id, nombre) 
    values (" . $id . ",
    '" . $nombre . "');";

    try {
        $ejecutar = mysqli_query($conexion, $sql);
        echo "<br>Datos almacenados";
       echo "<script>
                alert('Registro agregado correctamente.');
                window.location.href = '../vistas/peliculas.php';
            </script>";
        exit;
    } catch (Exception $th) {
        echo "<br>Datos no fueron guardados<br>" . $th;
    }
}


//Agregar Director

if (isset($_POST["btn_agregar_director"])) {

    //recibo datos de formulario
    $id = $_POST["input_director_id"];
    $nombre = $_POST["input_director_nombre"];
    $apellido = $_POST["input_director_apellido"];
    $paisID = $_POST["input_pais_id"];



    require_once("conexion.php");
    $sql = "insert into directores (director_id, nombre, apellido, pais_id) 
    values (" . $id . ",
    '" . $nombre . "',
    '" . $apellido . "',
    '" . $paisID . "');";

    try {
        $ejecutar = mysqli_query($conexion, $sql);
        echo "<br>Datos almacenados";
        echo "<script>
                alert('Registro agregado correctamente.');
                window.location.href = '../vistas/peliculas.php';
            </script>";
        exit;
    } catch (Exception $th) {
        echo "<br>Datos no fueron guardados<br>" . $th;
    }
}




// Porcesos Modificar ----------------------------


// Modificar pelicula

if (isset($_POST["btn_guardar_edicion"])) {

    // recibo datos formulario
    $peliculaId = $_POST["input_id"];
    $nombre = $_POST["input_nombre"];
    $estreno = $_POST["input_estreno"];
    $duracion = $_POST["input_duracion"];
    $director = $_POST["input_director"];


    $sql = 'UPDATE peliculas SET 
        nombre = "' . $nombre . '", 
        fecha_estreno = "' . $estreno . '", 
        duracion_minutos = "' . $duracion . '",  
        director_id = "' . $director . '" 
        
        WHERE pelicula_id = ' . $peliculaId . ';';

    echo $sql;

    try {
        $ejecutar = mysqli_query($conexion, $sql);
        echo "<script>
                alert('Cambios guardados correctamente.');
                window.location.href = '../vistas/peliculas.php';
            </script>";
        exit;
    } catch (Exception $th) {
        echo '<br> Datos no fueron actualizados' . $th;
    }
}
