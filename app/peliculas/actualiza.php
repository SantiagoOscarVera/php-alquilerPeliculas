<?php

session_start();

require "../config/database.php"; /* importamos la conexion de la base de datos, obtenemos los datos de esta ruta */

$id = $conn->real_escape_string($_POST['id']); /* agregamos id xq necesitamos saber que id vamos a actualizar */
$nombre = $conn->real_escape_string($_POST['nombre']);  /*Con esto hacemos una limpieza .obtenemos los valores y hacemos una insercion a la base de datos */
$descripcion = $conn->real_escape_string($_POST['descripcion']);
$genero = $conn->real_escape_string($_POST['genero']);

$sql = "UPDATE pelicula SET nombre = '$nombre', descripcion = '$descripcion', id_genero = '$genero' WHERE id='$id'"; /* insertamos estos valores a la tabla pelicula */
if($conn->query($sql)){ /* en caso de que si se ejecute la conexion a sql */
    
    $_SESSION['color'] = "success";
    $_SESSION['msg'] = "Registro actualizado";


    if($_FILES['poster']['error'] == UPLOAD_ERR_OK) { /* verificamos que no haya error o que la imagen este vacia. $_FILES es una variable global. ['poster']['error'] son dos infices.  UPLOAD_ERR_OK es lo mismo que poner cero significa que no tenga ningun error   */
        $permitidos = array("image/jpg","image/jpeg"); /* validamos el formato de la imagen */
        if(in_array($_FILES['poster']['type'], $permitidos)) { /* indicamos lo que vamos a validar y nos trae el tipo la extension etc- tambien le indicamos a donde vamos a buscar osea en "$permitidos"*/
            
            $dir = "posters"; /* guardamos todo en la carpeta posters */

            $info_img = pathinfo($_FILES['poster']['name']); /* si necesitamos traer imagenes que no sean solamente jpg, necesitamos esta linea con name para saber toda su info */
            $info_img['extension']; /* y esto es para conocer la ruta en caso que no sea jpg, como en este caso usamos solo jpg seteado, NO ES NECESARIO USARLO */

            $poster = $dir . '/' . $id . '.jpg';  /*USAMOS ESPECIFICAMENTE JPG. aca colocamos la ruta donde se va a guardar nuestra imagen y usamos el id del registro para asociar la imagen */

            if(!file_exists($dir)){ /* si no existe la carpeta posters, creala con mkdir y le pasamos los permisos */
                mkdir($dir, 0777);
            }

            if(!move_uploaded_file($_FILES['poster']['tmp_name'], $poster)){ /* movemos nuestro archivo.  ['tmp_name'] con esto lo guardamos en archivos temporales para poder identificarlo, y con "$poster" le damos el nuevo nombre y ubicacion en el que se va a encontrar. Esto te da un verdadero o falso*/
                $_SESSION['color'] = "danger";
                $_SESSION['msg'] .= "<br> Error al guardar imagen"; /* .= con esto se concatena para que no se solapen los mensajes */
                }
            } else {
                $_SESSION['color'] = "danger";
                $_SESSION['msg'] .= "<br> Formato de imagen no permitido";
            }
    }
} else { /* si tenemos un error o no se guarde */
    $_SESSION['color'] = "danger";
    $_SESSION['msg'] = "Error al actualizar registro"; /* aca no necesitamos concatenar */

}

header("Location: index.php"); /* esto nos regresa al index.php */

