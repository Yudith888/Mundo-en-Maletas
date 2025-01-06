<?php 

    include "../clases/conexion.php";
    include "../clases/cruditinerario.php";

    $cruditinerario = new cruditinerario();


    $datos = array(
        "nombre" => $_POST['nombre'],
        "imagenes" => $_POST['imagenes'],
        "costos_por_persona" => $_POST['costos_por_persona'],
        "hospedaje" => $_POST['hospedaje'],
        "ruta_viajera" => $_POST['ruta_viajera']

    );

    $resultado = $cruditinerario->insertarDatos($datos);

    if ($resultado->getInsertedId() > 0) {
         header("location:../itinerariocrud.php");
    }else{
        print_r($resultado);
    }

?>