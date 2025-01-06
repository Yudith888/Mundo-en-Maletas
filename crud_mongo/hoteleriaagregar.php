<?php include "./header.php";?>

<div class="card mt-4" >
  <div class="card-body">
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="hoteleriacrud.php" class="btn btn-info">
                <i class="fa-solid fa-backward"></i> Regresar</a>
                <h2>Agregar nuevo registro</h2>
                <form action="./procesos/insertarhoteleria.php" method="post">
                    <label for="slider">Slider</label>
                    <input type="text" class="form-control" id="slider" name="slider_id" >

                    <label for="imagen">Imagen</label>
                    <input type="text" class="form-control" id="imagen" name="imagen">

                    <label for="descripcion">Descripcion</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion">

                    <label for="precio">Precio</label>
                    <input type="number" class="form-control" id="precio" name="precio" >
                                        

                    <button class="btn btn-primary mt-3">
                    <i class="fa-solid fa-floppy-disk"></i> Agregar
                    </button>
                </form>
              
            </div>
        </div>
    </div>
  </div>
</div>


