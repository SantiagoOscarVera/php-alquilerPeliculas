<?php

require "../config/database.php"; /* importamos la conexion de la base de datos, obtenemos los datos de esta ruta */

$id = $conn->real_escape_string($_POST['id']); /* agregamos id xq necesitamos saber que id vamos a actualizar */
$nombre = $conn->real_escape_string($_POST['nombre']);  /*Con esto hacemos una limpieza .obtenemos los valores y hacemos una insercion a la base de datos */
$descripcion = $conn->real_escape_string($_POST['descripcion']);
$genero = $conn->real_escape_string($_POST['genero']);

$sql = "UPDATE pelicula SET nombre = '$nombre', descripcion = '$descripcion', id_genero = '$genero' WHERE id='$id'"; /* insertamos estos valores a la tabla pelicula */
if($conn->query($sql)){ /* en caso de que si se ejecute la conexion a sql */

}

header("Location: index.php"); /* esto nos regresa al index.php */

