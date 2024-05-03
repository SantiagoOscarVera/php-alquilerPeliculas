<?php

require "../config/database.php"; /* importamos la conexion de la base de datos, obtenemos los datos de esta ruta */

$id = $conn->real_escape_string($_POST['id']); /* agregamos id xq necesitamos saber que id vamos a actualizar */

$sql = "DELETE FROM pelicula WHERE id='$id'"; /* ELIMINAMOS estos valores de la tabla pelicula */
if($conn->query($sql)){ /* en caso de que si se ejecute la conexion a sql */

    $dir = "posters"; /* guardamos todo en la carpeta posters */

    $poster = $dir . '/' . $id . '.jpg';  /*USAMOS ESPECIFICAMENTE JPG. aca colocamos la ruta donde se va a guardar nuestra imagen y usamos el id del registro para asociar la imagen */

    if (file_exist($poster)) { /* si encontramos el registro */
        unlink($poster); /* con esto eliminamos el registro */
    }

    $_SESSION['color'] .= "Success";
    $_SESSION['msg'] .= "Registro eliminado";

} else {
    $_SESSION['color'] .= "Danger";
    $_SESSION['msg'] .= "Error al eliminar registro";
}
/* EN CASO DE QUE TODO SEA CORRECTO >>>>> REGRESAMOS AL INDEX */
header("Location: index.php"); /* esto nos regresa al index.php */

