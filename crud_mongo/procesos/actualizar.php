<?php 

include "../clases/conexion.php";
include "../clases/crud.php";

$crud = new crud();

$id = $_POST["id"];

// Verificamos si el campo 'enlace' está presente en el formulario
$datos = array(
    "nombre" => $_POST['nombre'],
    "imagen" => $_POST['imagen'],
    "descripcion" => $_POST['descripcion'],
    "enlace" => isset($_POST['enlace']) ? $_POST['enlace'] : ''  // Verificamos si el campo 'enlace' está definido
);

// Realizamos la actualización
$resultado = $crud->actualizar($id, $datos);

// Verificamos el resultado de la actualización
if ($resultado && ($resultado->getModifiedCount() > 0 || $resultado->getMatchedCount() > 0)) {
    header("location:../index.php");
} else {
    print_r($resultado); // Mostramos el resultado en caso de error
}

?>
