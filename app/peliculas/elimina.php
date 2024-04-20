<?php

require "../config/database.php"; /* importamos la conexion de la base de datos, obtenemos los datos de esta ruta */

$id = $conn->real_escape_string($_POST['id']); /* agregamos id xq necesitamos saber que id vamos a actualizar */

$sql = "DELETE FROM pelicula WHERE id='$id'"; /* ELIMINAMOS estos valores de la tabla pelicula */
if($conn->query($sql)){ /* en caso de que si se ejecute la conexion a sql */

}
/* EN CASO DE QUE TODO SEA CORRECTO >>>>> REGRESAMOS AL INDEX */
header("Location: index.php"); /* esto nos regresa al index.php */

