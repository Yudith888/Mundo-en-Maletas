<?php 

include "../clases/conexion.php";
include "../clases/crudhoteleria.php.php";

$crudhoteleria = new crudhoteleria();

$id = $_POST["id"];

// Verificamos si el campo 'enlace' está presente en el formulario
$datos = array(
    "slider_id" => $_POST['slider_id'],
    "imagen" => $_POST['imagen'],
    "descripcion" => $_POST['descripcion'],
    "precio" => $_POST['precio']
);

// Realizamos la actualización
$resultado = $crudhoteleria->actualizar($id, $datos);

// Verificamos el resultado de la actualización
if ($resultado && ($resultado->getModifiedCount() > 0 || $resultado->getMatchedCount() > 0)) {
    header("location:../hoteleriacrud.php");
} else {
    print_r($resultado); // Mostramos el resultado en caso de error
}

?>
