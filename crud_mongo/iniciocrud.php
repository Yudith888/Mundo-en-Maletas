

<?php 
     require_once "./clases/conexion.php";
    require_once "./clases/crudinicio.php";
    $crudinicio = new crudinicio();
    $datos = $crudinicio->mostrarDatos();

?>


<?php include "./header.php";?>


<div class="card mt-4" >
  <div class="card-body">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Inicio</h2>
                <a href="./inicioagregar.php" class="btn btn-primary">
                <i class="fa-solid fa-user-plus"></i>  Agregar Nuevo Registro
                </a>
                
                <hr>
                <table class="table table-sm table-hover table-bordered">
                    <thead>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </thead>
                    <tbody>
                    <?php 
                        foreach($datos as $item) {
                     ?>
                        <tr>
                            <td> <?php echo $item->nombre; ?> </td>
                            <td> <?php echo $item->tipo; ?> </td>
                            <td class="text-center">
                                <form action="" method="post">
                                    <button class="btn btn-warning">
                                    <i class="fa-solid fa-user-pen"></i>   Editar
                                    </button>
                                </form>
                            </td>
                            <td class="text-center">
                            <form action="./inicioeliminar.php" method="post">
                            <input type="text" name="id" value="<?php echo $id; ?>" hidden>
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
