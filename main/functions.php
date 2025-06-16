<?php

// Utilizar region 
require_once("conexion.php");



// Porcesos Eliminar ----------------------------

if (isset($_POST["btn_eliminar"])) {
    $codigo = $_POST["h_codigo_borrar"];
    $sql = "delete from ciudadanos where dpi = " . $codigo;

    try {
        $ejecutar = mysqli_query($conexion, $sql);
        echo "<br>Datos almacenados";
        header("Location:../vistas/ciudadanos.php");
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
        echo "<br>Datos almacenados";
        header("Location: ../vistas/peliculas.php");
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
        header("Location: ../vistas/peliculas.php");
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
        header("Location: ../vistas/peliculas.php");
        exit;
    } catch (Exception $th) {
        echo "<br>Datos no fueron guardados<br>" . $th;
    }
}




// Porcesos Modificar ----------------------------

if (isset($_POST["btn_modificar_depto"])) {

    // recibo datos formulario
    $cod_depto = $_POST["txt_cod_depto"];
    $nombre = $_POST["txt_nombre_depto"];
    $cod_region = $_POST["txt_cod_region"];
    

    $sql = 'UPDATE departamentos SET 
        nombre_depto = "' . $nombre . '", 
        cod_region = "' . $cod_region . '" 
        
        WHERE cod_depto = ' . $cod_depto . ';';

    echo $sql;

    try {
        $ejecutar = mysqli_query($conexion, $sql);
        header('Location: ../vistas/departamentos.php');
    } catch (Exception $th) {
        echo '<br> Datos no fueron actualizados' . $th;
    }
}


?>