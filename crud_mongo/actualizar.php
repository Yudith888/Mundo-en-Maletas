<?php 
include "./clases/conexion.php";
include "./clases/crud.php";

// Obtenemos la instancia de la clase crud
$crud = new crud();

// Verificamos si se ha enviado el id
$id = $_POST['id'];

// Obtenemos los datos del documento
$datosCursor = $crud->obtenerDocumento($id);

// Convertimos el cursor en un arreglo
$datos = iterator_to_array($datosCursor);

// Asegurándonos de que el arreglo no esté vacío
if (empty($datos)) {
    echo "No se encontró el documento con el ID proporcionado.";
    exit;
}

// Obtenemos el _id del primer documento
$idmongo = $datos[0]['_id'];  // Suponiendo que el cursor devuelve al menos un documento

include "./header.php";
?>

<div class="card mt-4">
  <div class="card-body">
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="index.php" class="btn btn-info">
                <i class="fa-solid fa-backward"></i> Regresar</a>
                <h2>Actualizar registro</h2>
                <form action="./procesos/actualizar.php" method="POST">
                    <input type="text" hidden value="<?php echo $idmongo ?>" name="id">
                    
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo isset($datos[0]['nombre']) ? $datos[0]['nombre'] : ''; ?>">

                    <label for="descripcion">Descripción</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo isset($datos[0]['descripcion']) ? $datos[0]['descripcion'] : ''; ?>">

                    <label for="imagen">Imagen</label>
                    <input type="text" class="form-control" id="imagen" name="imagen" value="<?php echo isset($datos[0]['imagen']) ? $datos[0]['imagen'] : ''; ?>">

                    <label for="enlace">Enlace</label>
                    <input type="text" class="form-control" id="enlace" name="enlace" value="<?php echo isset($datos[0]['enlace']) ? $datos[0]['enlace'] : ''; ?>">

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
