<?php 
include "./clases/conexion.php";
include "./clases/crud.php";
include "./header.php";

$crud = new crud();
$id = $_POST['id'];
$datos = $crud->obtenerDocumento($id);

?>

<div class="card mt-4">
  <div class="card-body">
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="index.php" class="btn btn-info">
                <i class="fa-solid fa-backward"></i> Regresar</a>
                <h2>Eliminar registro</h2>
                <table class="table table-bordered">
                    <thead>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Imagen</th>
                        <th>Enlace</th>  
                    </thead>
                    <tbody>
                    <?php
                    foreach ($datos as $documento) {
                        // Asegúrate de que las propiedades existan antes de intentar acceder a ellas
                        echo "<tr>";
                        echo "<td>" . (isset($documento['nombre']) ? $documento['nombre'] : 'N/A') . "</td>";
                        echo "<td>" . (isset($documento['imagen']) ? $documento['imagen'] : 'N/A') . "</td>";
                        echo "<td>" . (isset($documento['descripcion']) ? $documento['descripcion'] : 'N/A') . "</td>";
                        echo "<td>" . (isset($documento['enlace']) ? $documento['enlace'] : 'N/A') . "</td>";
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
                <hr>

                <div class="alert alert-danger" role="alert">
                 <p>¿Estás seguro de eliminar este registro?</p>
                 <p>Una vez eliminado no podrá ser recuperado</p>
                </div>

                <form action="./procesos/eliminar.php" method="POST">
                    <input type="text" name="id" value="<?php echo $id; ?>" hidden>
                    
                    <button class="btn btn-danger">
                    <i class="fa-solid fa-user-xmark"></i> Eliminar
                    </button>
                </form>

            </div>
        </div>
    </div>
  </div>
</div>

<?php include "./scripts.php";?>


