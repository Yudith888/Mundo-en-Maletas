<?php include "./header.php";?>

<div class="card mt-4" >
  <div class="card-body">
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="itinerariocrud.php" class="btn btn-info">
                <i class="fa-solid fa-backward"></i> Regresar</a>
                <h2>Agregar nuevo registro</h2>
                <form action="./procesos/insertaritinerario.php" method="post">

                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" >

                    <label for="imagenes">Imagenes</label>
                    <input type="text" class="form-control" id="imagenes" name="imagenes">

                    <label for="costos_por_persona">Costos por persona</label>
                    <input type="text" class="form-control" id="costos_por_persona" name="costos_por_persona">

                    <label for="hospedaje">Hospedaje</label>
                    <input type="text" class="form-control" id="hospedaje" name="hospedaje" >

                    <label for="ruta_viajera">Ruta viajera</label>
                    <input type="text" class="form-control" id="ruta_viajera" name="ruta_viajera" >
                                        

                    <button class="btn btn-primary mt-3">
                    <i class="fa-solid fa-floppy-disk"></i> Agregar
                    </button>
                </form>
              
            </div>
        </div>
    </div>
  </div>
</div>


