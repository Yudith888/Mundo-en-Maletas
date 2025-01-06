<?php 
include "./clases/conexion.php";
include "./clases/crudhoteleria.php";

// Obtenemos la instancia de la clase crud
$crudhoteleria = new crudhoteleria();

// Verificamos si se ha enviado el id a través de POST
if (isset($_POST['id'])) {
    // Si existe el 'id', lo asignamos a la variable $id
    $id = $_POST['id'];

    // Obtenemos los datos del documento
    $datosCursor = $crudhoteleria->obtenerDocumento($id);

    // Convertimos el cursor en un arreglo
    $datos = iterator_to_array($datosCursor);

    // Asegurándonos de que el arreglo no esté vacío
    if (empty($datos)) {
        echo "No se encontró el documento con el ID proporcionado.";
        exit;
    }

    // Obtenemos el _id del primer documento
    $idmongo = $datos[0]['_id'];  // Suponiendo que el cursor devuelve al menos un documento
} else {
    echo "No se ha enviado un ID válido.";
    exit;
}

include "./header.php";
?>

<div class="card mt-4">
  <div class="card-body">
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="hoteleriacrud.php" class="btn btn-info">
                <i class="fa-solid fa-backward"></i> Regresar</a>
                <h2>Actualizar registro</h2>
                
                <form action="./procesos/actualizarhoteleria.php" method="post">
                    <input type="text" hidden value="<?php echo $idmongo ?>" name="id">

                    <label for="slider">Slider</label>
                    <input type="text" class="form-control" id="slider_id" name="slider_id" value="<?php echo isset($datos[0]['slider_id']) ? $datos[0]['slider_id'] : ''; ?>">

                    <label for="imagen">Imagen</label>
                    <input type="text" class="form-control" id="imagen" name="imagen" value="<?php echo isset($datos[0]['imagen']) ? $datos[0]['imagen'] : ''; ?>">

                    <label for="descripcion">Descripcion</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo isset($datos[0]['descripcion']) ? $datos[0]['descripcion'] : ''; ?>">

                    <label for="precio">Precio</label>
                    <input type="number" class="form-control" id="precio" name="precio" value="<?php echo isset($datos[0]['precio']) ? $datos[0]['precio'] : ''; ?>">

                    <button class="btn btn-primary mt-3">
                        <i class="fa-solid fa-floppy-disk"></i> Actualizar
                    </button>
                </form>
            </div>
        </div>
    </div>
  </div>
</div>

<?php include "./scripts.php"; ?>
