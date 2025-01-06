<?php 
include "./clases/conexion.php";
include "./clases/crudhoteleria.php";
include "./header.php";

$crudhoteleria = new crudhoteleria();
$id = $_POST['id'];
$datos = $crudhoteleria->obtenerDocumento($id);

?>

<div class="card mt-4">
  <div class="card-body">
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="hoteleriacrud.php" class="btn btn-info">
                <i class="fa-solid fa-backward"></i> Regresar</a>
                <h2>Eliminar registro</h2>
                <table class="table table-bordered">
                    <thead>
                        <th>slider_id</th>
                        <th>imagen</th>
                        <th>descripcion</th>
                        <th>precio</th>  
                    </thead>
                    <tbody>
                    <?php
                    foreach ($datos as $documento) {
                        // Asegúrate de que las propiedades existan antes de intentar acceder a ellas
                        echo "<tr>";
                        echo "<td>" . (isset($documento['slider_id']) ? $documento['slider_id'] : 'N/A') . "</td>";
                        echo "<td>" . (isset($documento['imagen']) ? $documento['imagen'] : 'N/A') . "</td>";
                        echo "<td>" . (isset($documento['descripcion']) ? $documento['descripcion'] : 'N/A') . "</td>";
                        echo "<td>" . (isset($documento['precio']) ? $documento['precio'] : 'N/A') . "</td>";
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

                <form action="./procesos/eliminarhoteleria.php" method="POST">
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



