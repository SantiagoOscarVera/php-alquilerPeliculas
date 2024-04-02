<?php

require "../config/database.php"; /* importamos la conexion de la base de datos, obtenemos los datos de esta ruta */

$id = $conn->real_escape_string($_POST['id']);  /*Con esto hacemos una limpieza .obtenemos los valores y hacemos una insercion a la base de datos */

$sql = "SELECT id, nombre, descripcion, id_genero FROM pelicula WHERE id=$id LIMIT 1"; /* HACEMOS UNA CONSULTA, "WHERE... cuando el id coincida con el id" y el limit es para que cuando coincida solo se quede con el primero */
$resultado = $conn->query($sql); /* esta variable es igual a la ejecucion de este query */
$rows = $resultado->num_rows; /* verificamos si la consulta trae filas */

$pelicula = []; /* para agarrar los datos del json necesitamos un array */

if ($rows > 0) { /* si es mayor a cero significa que si trae informacion */
    $pelicula = $resultado->fetch_assoc(); /* a la variable pelicula le asignamos el resultado pero con la funcion "fetch_assoc()" para que nos traiga los datos id, nombre, descripcion, genero como arreglos*/
}

echo json_encode($pelicula, JSON_UNESCAPED_UNICODE); /* con esto retornamos pelicula y en caso de que traiga acento le ponemos JSON_UNESCAPED_UNICODE para que se puedan procesar bien */