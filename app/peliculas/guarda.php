<?php

require "../config/database.php"; /* importamos la conexion de la base de datos, obtenemos los datos de esta ruta */

$nombre = $conn->real_escape_string($_POST['nombre']);  /*Con esto hacemos una limpieza .obtenemos los valores y hacemos una insercion a la base de datos */
$descripcion = $conn->real_escape_string($_POST['descripcion']);
$genero = $conn->real_escape_string($_POST['genero']);

$sql = "INSERT INTO pelicula (nombre, descripcion, id_genero, fecha_alta) /* insertamos estos valores a la tabla pelicula */
VALUES ('$nombre', '$descripcion', $genero, NOW())"; /* NOW nos trae la hora y fecha del servidor de mySQL, se le pone comillas simples '' ya que son cadenas de texto. a genero se lo deja sin comillas porque es un int */
if($conn->query($sql)){ /* en caso de que si se ejecute la conexion a sql */
    $id = $conn->insert_id; /* obtenemos o creamos el id con la conexion y la funcion insert id  */

    if($_FILES['poster']['error'] == UPLOAD_ERR_OK) { /* verificamos que no haya error o que la imagen este vacia. $_FILES es una variable global. ['poster']['error'] son dos infices.  UPLOAD_ERR_OK es lo mismo que poner cero significa que no tenga ningun error   */
        $permitidos = array("image/jpg","image/jpeg"); /* validamos el formato de la imagen */
        if(in_array($_FILES['poster']['type'], $permitidos)) { /* indicamos lo que vamos a validar y nos trae el tipo la extension etc- tambien le indicamos a donde vamos a buscar osea en "$permitidos"*/
            

        }
    }
}

header("Location: index.php"); /* esto nos regresa al index.php */

