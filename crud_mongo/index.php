

<?php 
     require_once "./clases/conexion.php";
    require_once "./clases/crud.php";
    $crud = new crud();
    $datos = $crud->mostrarDatos();

?>


<?php include "./header.php";?>


<div class="card mt-4" >
  <div class="card-body">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Planes</h2>
                <a href="./agregar.php" class="btn btn-primary">
                <i class="fa-solid fa-user-plus"></i>  Agregar Nuevo Registro
                </a>
                
                <hr>
                <table class="table table-sm table-hover table-bordered">
                    <thead>
                        <th>nombre</th>
                        <th>imagen</th>
                        <th>descripcion</th>
                        <th>enlace</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </thead>
                    <tbody>
                    <?php 
                        foreach($datos as $item) {
                     ?>
                        <tr>
                            <td> <?php echo $item->nombre; ?> </td>
                            <td> <?php echo $item->imagen; ?> </td>
                            <td> <?php echo $item->descripcion; ?> </td>
                            <td> <?php echo $item->enlace; ?> </td>
                            <td class="text-center">
                                <form action="./actualizar.php" method="POST">
                                <input type="text" hidden value="<?php echo $item->_id ?>" name="id">
                                    <button class="btn btn-warning">
                                    <i class="fa-solid fa-user-pen"></i>   Editar
                                    </button>
                                </form>
                            </td>
                            <td class="text-center">
                            <form action="./eliminar.php" method="POST">
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
