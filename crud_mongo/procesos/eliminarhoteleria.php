<?php 

    include "../clases/conexion.php";
    include "../clases/crudhoteleria.php";

    $crudhoteleria = new crudhoteleria();
    $id = $_POST['id'];

    $resultado = $crudhoteleria->eliminar($id);

    if ($resultado->getDeletedCount() > 0) {
       header("location:../hoteleriacrud.php");
    }else{
        print_r($resultado);
    }



?>
