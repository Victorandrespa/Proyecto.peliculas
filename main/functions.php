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


if (isset($_POST["btn_insertar_depto"])) {

    //recibo datos de formulario
    $codigo = $_POST["txt_cod_depto"];
    $nombre = $_POST["txt_nombre_depto"];
    $cod_region = $_POST["txt_cod_region"];

    require_once("conexion.php");
    $sql = "insert into departamentos (cod_depto, nombre_depto, cod_region) 
    values (" . $codigo . ",
    '" . $nombre . "',
    '" . $cod_region . "');";


    try {
        $ejecutar = mysqli_query($conexion, $sql);
        echo "<br>Datos almacenados";
        header("Location: ../vistas/departamentos.php");
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