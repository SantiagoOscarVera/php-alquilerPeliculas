<?php /* archivo que conecta a la base de datos phpmysql */

$conn = new mysql("127.0.0.1", "root", "password", "cinema"); /* direccion ip de conexion, nombre de usuario, password, nombre de la base de datos */

/* verificamos que no tenga ningun error */
if($conn -> connect_error) {
    die("Error de conexión" . $conn ->connect_error);
}