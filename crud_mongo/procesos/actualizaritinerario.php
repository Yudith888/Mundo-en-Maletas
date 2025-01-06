<?php 

include "../clases/conexion.php";
include "../clases/cruditinerario.php.php";

$cruditinerario = new cruditinerario();

$id = $_POST["id"];

// Verificamos si el campo 'enlace' está presente en el formulario
$datos = array(
    "nombre" => $_POST['nombre'],
    "imagenes" => $_POST['imagenes'],
    "costos_por_persona" => $_POST['costos_por_persona'],
    "hospedaje" => $_POST['hospedaje'],
    "ruta_viajera" => $_POST['ruta_viajera']

);

// Realizamos la actualización
$resultado = $cruditinerario->actualizar($id, $datos);

// Verificamos el resultado de la actualización
if ($resultado && ($resultado->getModifiedCount() > 0 || $resultado->getMatchedCount() > 0)) {
    header("location:../itinerariocrud.php");
} else {
    print_r($resultado); // Mostramos el resultado en caso de error
}

?>
