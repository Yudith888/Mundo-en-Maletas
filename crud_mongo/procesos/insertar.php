<?php 

    include "../clases/conexion.php";
    include "../clases/crud.php";

    $crud = new crud();

    $datos = array(
        "nombre" => $_POST['nombre'],
        "imagen" => $_POST['imagen'],
        "descripcion" => $_POST['descripcion'],
        "enlace" => $_POST['enlace']
    );

    $resultado = $crud->insertarDatos($datos);

    if ($resultado->getInsertedId() > 0) {
         header("location:../index.php");
    }else{
        print_r($resultado);
    }

?>