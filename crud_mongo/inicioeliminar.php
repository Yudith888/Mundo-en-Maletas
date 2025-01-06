<?php 
include "./clases/conexion.php";
include "./clases/crudinicio.php";
include "./header.php";

$crudinicio = new crudinicio();
$id = isset($_POST['id']) ? $_POST['id'] : null;

// Asegúrate de que el ID se ha proporcionado
if (!$id) {
    echo "<div class='alert alert-danger'>Error: No se proporcionó un ID válido.</div>";
    exit;
}

// Obtener los datos
$datos = $crudinicio->obtenerDocumento($id);

// Depuración: Verificar qué contiene $datos
var_dump($datos);  // Esto te ayudará a entender qué tipo de dato es.

?>

<div class="card mt-4">
  <div class="card-body">
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="iniciocrud.php" class="btn btn-info">
                <i class="fa-solid fa-backward"></i> Regresar</a>
                <h2>Eliminar registro</h2>
                <table class="table table-bordered">
                    <thead>
                        <th>Nombre</th>
                        <th>Tipo</th>
                    </thead>
                    <tbody>
                    <?php 
                    // Verificar si $datos es iterable antes de usar foreach
                    if (is_iterable($datos)) {
                        foreach ($datos as $documento) {
                            // Asegúrate de que las propiedades existan antes de intentar acceder a ellas
                            echo "<tr>";
                            echo "<td>" . (isset($documento['nombre']) ? $documento['nombre'] : 'N/A') . "</td>";
                            echo "<td>" . (isset($documento['tipo']) ? $documento['tipo'] : 'N/A') . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='2'>No se encontraron datos para mostrar.</td></tr>";
                    }
                    ?>
                    </tbody>
                </table>
                <hr>

                <div class="alert alert-danger" role="alert">
                 <p>¿Estás seguro de eliminar este registro?</p>
                 <p>Una vez eliminado no podrá ser recuperado</p>
                </div>

                <form action="./procesos/eliminarinicio.php" method="POST">
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
