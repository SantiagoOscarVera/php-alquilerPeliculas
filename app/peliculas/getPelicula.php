<?php

require "../config/database.php"; /* importamos la conexion de la base de datos, obtenemos los datos de esta ruta */

$nombre = $conn->real_escape_string($_POST['nombre']);  /*Con esto hacemos una limpieza .obtenemos los valores y hacemos una insercion a la base de datos */
