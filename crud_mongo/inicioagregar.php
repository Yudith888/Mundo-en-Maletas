<?php include "./header.php";?>

<div class="card mt-4" >
  <div class="card-body">
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="iniciocrud.php" class="btn btn-info">
                <i class="fa-solid fa-backward"></i> Regresar</a>
                <h2>Agregar nuevo registro</h2>
                <form action="./procesos/insertarinicio.php" method="post">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" >

                    <label for="tipo">Tipo</label>
                    <input type="text" class="form-control" id="tipo" name="tipo">
                    

                    <button class="btn btn-primary mt-3">
                    <i class="fa-solid fa-floppy-disk"></i> Agregar
                    </button>
                </form>
              
            </div>
        </div>
    </div>
  </div>
</div>





<?php include "./scripts.php";?>