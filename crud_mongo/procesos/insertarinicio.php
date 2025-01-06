<?php 

    include "../clases/conexion.php";
    include "../clases/crudinicio.php";

    $crudinicio = new crudinicio();

    $datos = array(
        "nombre" => $_POST['nombre'],
        "tipo" => $_POST['tipo']
    );

    $resultado = $crudinicio->insertarDatos($datos);

    if ($resultado->getInsertedId() > 0) {
         header("location:../iniciocrud.php");
    }else{
        print_r($resultado);
    }

?>