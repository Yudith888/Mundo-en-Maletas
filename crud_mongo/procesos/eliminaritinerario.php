<?php 

    include "../clases/conexion.php";
    include "../clases/cruditinerario.php";

    $cruditinerario = new cruditinerario();
    $id = $_POST['id'];

    $resultado = $cruditinerario->eliminar($id);

    if ($resultado->getDeletedCount() > 0) {
       header("location:../itinerariocrud.php");
    }else{
        print_r($resultado);
    }



?>