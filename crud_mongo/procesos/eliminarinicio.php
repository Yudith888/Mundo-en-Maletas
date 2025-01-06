<?php 

    include "../clases/conexion.php";
    include "../clases/crudinicio.php";

    $crudinicio = new crudinicio();
    $id = $_POST['id'];

    $resultado = $crudinicio->eliminar($id);

    if ($resultado->getDeletedCount() > 0) {
       header("location:../iniciocrud.php");
    }else{
        print_r($resultado);
    }



?>
