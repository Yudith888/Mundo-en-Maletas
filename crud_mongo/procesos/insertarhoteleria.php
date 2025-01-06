<?php 

    include "../clases/conexion.php";
    include "../clases/crudhoteleria.php";

    $crudhoteleria = new crudhoteleria();

    $datos = array(
        "slider_id" => $_POST['slider_id'],
        "imagen" => $_POST['imagen'],
        "descripcion" => $_POST['descripcion'],
        "precio" => $_POST['precio']
    );

    $resultado = $crudhoteleria->insertarDatos($datos);

    if ($resultado->getInsertedId() > 0) {
         header("location:../hoteleriacrud.php");
    }else{
        print_r($resultado);
    }

?>