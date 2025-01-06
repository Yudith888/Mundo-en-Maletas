

<?php 
    require_once "./clases/conexion.php";
    require_once "./clases/crudhoteleria.php";
    $crudhoteleria = new crudhoteleria();
    $datos = $crudhoteleria->mostrarDatos();

?>


<?php include "./header.php";?>


<div class="card mt-4" >
  <div class="card-body">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Crud con mongodb y php</h2>
                <a href="hoteleriaagregar.php" class="btn btn-primary">
                <i class="fa-solid fa-user-plus"></i>  Agregar Nuevo Registro
                </a>
                
                <hr>
                <table class="table table-sm table-hover table-bordered">
                    <thead>
                        <th>Slider</th>
                        <th>Imagen</th>
                        <th>Descripcion</th>                    
                        <th>Precio</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </thead>
                    <tbody>
    <?php foreach($datos as $item): ?>
    <tr>
        <td><?php echo $item['slider_id']; ?></td>
        <td><?php echo $item['imagen']; ?></td>
        <td><?php echo $item['descripcion']; ?></td>
        <td><?php echo $item['precio']; ?></td>
        <td class="text-center">
            <a href="hoteleriaactualizar.php" class="btn btn-warning">
                <i class="fa-solid fa-user-pen"></i> Editar
            </a>
        </td>
        <td class="text-center">
            <form action="./hoteleriaeliminar.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $item['_id']; ?>">
                <button class="btn btn-danger">
                    <i class="fa-solid fa-user-xmark"></i> Eliminar
                </button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</tbody>

                </table>
            </div>
        </div>
    </div>
  </div>
</div>




<?php include "./scripts.php";?>
