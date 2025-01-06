
<?php 
     require_once "./clases/conexion.php";
    require_once "./clases/cruditinerario.php";
    $cruditinerario = new cruditinerario();
    $datos = $cruditinerario->mostrarDatos();

?>


<?php include "./header.php";?>


<div class="card mt-4" >
  <div class="card-body">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Itinerario</h2>
                <a href="itinerarioagregar.php" class="btn btn-primary">
                <i class="fa-solid fa-user-plus"></i>  Agregar Nuevo Registro
                </a>
                
                <hr>
                <table class="table table-sm table-hover table-bordered">
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
                            <td class="text-center">
                                <form action="" method="post">
                                    <button class="btn btn-warning">
                                    <i class="fa-solid fa-user-pen"></i>   Editar
                                    </button>
                                </form>
                            </td>
                            <td class="text-center">
                            <form action="./itinerarioeliminar.php" method="post">
                            <input type="text" hidden value="<?php echo $item->_id ?>" name="id">
                                    <button class="btn btn-danger">
                                    <i class="fa-solid fa-user-xmark"></i>   Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php 
                            }
                         ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>
</div>




<?php include "./scripts.php";?>
