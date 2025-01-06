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
<?php include "./header.php";?>

<div class="card mt-4" >
  <div class="card-body">
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="itinerariocrud.php" class="btn btn-info">
                <i class="fa-solid fa-backward"></i> Regresar</a>
                <h2>Actualizar registro</h2>
                <form action="" method="post">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" >

                    <label for="imagenes">Imagenes</label>
                    <input type="text" class="form-control" id="imagenes" name="imagenes">

                    <label for="costos_por_persona">Costos por persona</label>
                    <input type="text" class="form-control" id="costos_por_persona" name="costos_por_persona">

                    <label for="hospedaje">Hospedaje</label>
                    <input type="text" class="form-control" id="hospedaje" name="hospedaje" >

                    <label for="ruta_viajera">Ruta viajera</label>
                    <input type="text" class="form-control" id="ruta_viajera" name="ruta_viajera" >
                    

                    <button class="btn btn-primary mt-3">
                    <i class="fa-solid fa-floppy-disk"></i> Actualizar
                    </button>
                </form>
              
            </div>
        </div>
    </div>
  </div>
</div>


