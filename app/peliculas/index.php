<?php

require "../config/database.php" /* traemos la configuracion de donde esta la base de datos */

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crud-modal</title>

    <link rel="stylesheet" href= "../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href= "../../assets/css/all.min.css"> <!-- estilos e iconos https://fontawesome.com/icons/circle-plus?f=classic&s=solid -->

</head>
<body>

    <div class="container py-3">

        <h2 class="text-center">Peliculas</h2>
        <div class="row justify-content-center ">
            <div class="col-auto">
                <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuevoModal">
                <svg xmlns="http://www.w3.org/2000/svg" style="width:27px; padding-right:10px" viewBox="0 0 512 512"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/></svg>
                Nuevo registro
                </a>
            </div>
        </div>
        <table class="table table-sm table-striped table-over  mt-3">
        <thead class="table-dark" > <!-- encabezados -->
            <tr> <!-- fila -->
                <th>#</th> <!-- encabezado -->
                <th>Nombre</th> <!-- encabezado -->
                <th>Descripcion</th> <!-- encabezado -->
                <th>Género</th> <!-- encabezado -->
                <th>Poster</th> <!-- encabezado -->
                <th>Accion</th> <!-- encabezado -->
            </tr>
        </thead>

            <tbody>

            </tbody>
        </table>

    </div>
    
    <?php
    $sqlGenero = "SELECT id, nombre FROM genero"; /* se hace una consulta que trae el nombre de la tabla y trae todos */
    $generos = $conn->query($sqlGenero); /* funcion de mysql */ /* traemos el estado de la tabla genero  */
    ?>
    <?php include "nuevoModal.php"; ?> <!-- incluimos el archivo que tiene el modal -->
<script src="../../assets/js/bootstrap.bundle.min.js" ></script>
</body>
</html>