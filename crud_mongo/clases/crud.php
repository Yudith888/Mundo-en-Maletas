<?php

class crud extends conexion {
    // Métodos de la clase
    public function mostrarDatos() {
        try {
            $conexion = parent::conectar();
            $coleccion = $conexion->planes;
            $datos = $coleccion->find();
            return $datos;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    
    public function obtenerDocumento($id) {
        try {
            $conexion = parent::conectar();
            $coleccion = $conexion->planes;
            $datos = $coleccion->find(
                array(
                    '_id' => new MongoDB\BSON\ObjectId($id)
                )
            );
            return $datos;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function insertarDatos($datos) {
        try {
            $conexion = parent::conectar();
            $coleccion = $conexion->planes;
            $resultado = $coleccion->insertOne($datos);
            return $resultado;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function eliminar($id){
        try {
            $conexion = parent::conectar();
            $coleccion = $conexion->planes;
            $resultado = $coleccion->deleteOne(
                array(
                    "_id" => new MongoDB\BSON\ObjectId($id)
                )
                                        
            );
            return $resultado;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function actualizar ($id, $datos){
        try {
            $conexion = parent::conectar();
            $coleccion = $conexion->planes;
            $resultado = $coleccion->updateOne(
                                    [
                                        '_id' => new MongoDB\BSON\ObjectId($id)],
                                        [
                                            '$set' => $datos
                                        ]
                                        
            );
            return $resultado;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    
}
?>
