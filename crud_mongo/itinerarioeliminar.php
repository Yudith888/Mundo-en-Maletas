<?php 
include "./clases/conexion.php";
include "./clases/cruditinerario.php";
include "./header.php";

$cruditinerario = new cruditinerario();
$id = $_POST['id'];
$datos = $cruditinerario->obtenerDocumento($id);

?>

<div class="card mt-4">
  <div class="card-body">
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="itinerariocrud.php" class="btn btn-info">
                <i class="fa-solid fa-backward"></i> Regresar</a>
                <h2>Eliminar registro</h2>
                <table class="table table-bordered">
                    <thead>
                    <th>Nombre</th>
                        <th>imagenes</th>
                        <th>Costos por persona</th>
                        <th>Hospedaje</th>
                        <th>Ruta viajera</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </thead>
                    <tbody>
                   <?php 
                        foreach($datos as $item) {
                     ?>
                        <tr>
                            <td> <?php echo $item->nombre; ?> </td>
                            <td>
    <?php
    if ($item->imagenes instanceof MongoDB\Model\BSONArray) {
        foreach ($item->imagenes as $imagen) {
            // Muestra la imagen
            echo '<img src="' . $imagen . '" alt="">';
            // Muestra la dirección de la imagen
            echo '<br><small>' . $imagen . '</small>';
        }
    } else {
        // Si solo hay una imagen, muestra la imagen y su dirección
        echo '<img src="' . $item->imagenes . '" alt="">';
        echo '<br><small>' . $item->imagenes . '</small>';
    }
    ?>
</td>


<td>
    <?php
    if ($item->costos_por_persona instanceof MongoDB\Model\BSONDocument) {
        // Accede a los campos del BSONDocument, reemplaza con el campo adecuado
        echo $item->costos_por_persona['valor'];  // Muestra el valor específico dentro del BSONDocument
    } else {
        // Si no es un BSONDocument, simplemente muéstralo
        echo $item->costos_por_persona;
    }
    ?>
</td>
                            <td> <?php echo $item->hospedaje; ?> </td>
                            
                            <td>
    <?php
    if ($item->ruta_viajera instanceof MongoDB\Model\BSONArray) {
        foreach ($item->ruta_viajera as $ruta) {
            echo $ruta . "<br>";  // Muestra cada elemento de ruta_viajera en una nueva línea
        }
    } else {
        echo $item->ruta_viajera;
    }
    ?>
</td>
                    </tbody>
                </table>
                <hr>
                <?php 
                            }
                         ?>

                <div class="alert alert-danger" role="alert">
                 <p>¿Estás seguro de eliminar este registro?</p>
                 <p>Una vez eliminado no podrá ser recuperado</p>
                </div>

                <form action="./procesos/eliminaritinerario.php" method="POST">
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


