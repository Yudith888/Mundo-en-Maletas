<?php 

include "../clases/conexion.php";
include "../clases/crudinicio.php.php";

$crudinicio = new crudinicio();

$id = $_POST["id"];

// Verificamos si el campo 'enlace' está presente en el formulario
$datos = array(
    "nombre" => $_POST['nombre'],
    "tipo" => $_POST['tipo']
);

// Realizamos la actualización
$resultado = $crudinicio->actualizar($id, $datos);

// Verificamos el resultado de la actualización
if ($resultado && ($resultado->getModifiedCount() > 0 || $resultado->getMatchedCount() > 0)) {
    header("location:../iniciocrud.php");
} else {
    print_r($resultado); // Mostramos el resultado en caso de error
}

?>
