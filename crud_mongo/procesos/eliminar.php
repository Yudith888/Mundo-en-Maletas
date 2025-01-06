<?php 

    include "../clases/conexion.php";
    include "../clases/crud.php";

    $crud = new crud();
    $id = $_POST['id'];

    $resultado = $crud->eliminar($id);

    if ($resultado->getDeletedCount() > 0) {
       header("location:../index.php");
    }else{
        print_r($resultado);
    }



?>