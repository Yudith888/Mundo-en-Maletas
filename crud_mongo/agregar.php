<?php include "./header.php";?>

<div class="card mt-4" >
  <div class="card-body">
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="index.php" class="btn btn-info">
                <i class="fa-solid fa-backward"></i> Regresar</a>
                <h2>Agregar nuevo registro</h2>
                <form action="./procesos/insertar.php" method="post">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" >

                    <label for="imagen">Imagen</label>
                    <input type="text" class="form-control" id="imagen" name="imagen">

                    <label for="descripcion">Descripcion</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion">


                    <label for="enlace">Enlace</label>
                    <input type="text" class="form-control" id="enlace" name="enlace" >
                    

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