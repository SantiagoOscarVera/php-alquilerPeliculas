<?php

require "../config/database.php"; /* traemos la configuracion de donde esta la base de datos */

$sqlPeliculas = "SELECT p.id, p.nombre, p.descripcion, g.nombre AS genero FROM pelicula AS p /* consulta sql*/ /* p es de la columna peliculas y g de genero */
INNER JOIN genero AS g ON p.id_genero=g.id"; /* el genero de las peliculas se relacionan con la tabla genero y su id */
$peliculas = $conn->query($sqlPeliculas); /* ejecutamos la consulta */ /* $conn->query es la conexion */
/* abajo en la seccion de tablas renderizamos las filas */
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
            <?php while ($row_peliculas = $peliculas->fetch_assoc()) { ?>
                <tr>
                    <td><?= $row_peliculas['id']; ?></td>
                    <td><?= $row_peliculas['nombre']; ?></td>
                    <td><?= $row_peliculas['descripcion']; ?></td>
                    <td><?= $row_peliculas['genero']; ?></td>
                    <td></td>
                    <td>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#editaModal" data-bs-id="<?= $row_peliculas['id']; ?>" class="btn btn-sm btn-warning"><svg style="width: 13px;padding-bottom: 4px;" viewBox="0 0 512 512"><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg>
                        Editar <!-- data-bs-toggle="modal" data-bs-target="#editaModal" esta seccion nos trae el modal, abajo complementamos con la linea del archivo -->
                        </a>
                        <a href="#" class="btn btn-sm btn-danger"><svg style="width: 13px;padding-bottom: 4px;" viewBox="0 0 448 512"><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                        Eliminar
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    </div>
    
    <?php
    $sqlGenero = "SELECT id, nombre FROM genero"; /* se hace una consulta que trae el nombre de la tabla y trae todos */
    $generos = $conn->query($sqlGenero); /* funcion de mysql */ /* traemos el estado de la tabla genero  */
    ?>

    <?php include "nuevoModal.php"; ?> <!-- incluimos el archivo que tiene el modal -->

    <?php $generos-> data_seek(0);?> <!-- con esto reiniciamos la variable en la posicion 0 y con editar podemos recorrerlo de nuevo -->

    <?php include "editaModal.php"; ?>

    <script> /* javaScript */
        let editaModal = document.getElementById('editaModal')  /* para acceder a los eventos, vamos a detectar la ventana modal */
        
/*         editaModal.addEventListener('hide.bs.modal', event => {
            editaModal.querySelector('.modal-body #nombre').value = ""
            editaModal.querySelector('.modal-body #descripcion').value = ""
            editaModal.querySelector('.modal-body #genero').value = ""
            editaModal.querySelector('.modal-body #img_poster').value = ""
            editaModal.querySelector('.modal-body #poster').value = ""
        }) */

        editaModal.addEventListener('shown.bs.modal', event => { /* le indicamos el evento, se llama shown, se dispara alcargar toda la visualizacion del modal */
            let button = event.relatedTarget /* necesitamos saber a que icono se le dio click */
            let id = button.getAttribute('data-bs-id') /* ya con el boton detectado llamo al atributo data-bs-id que ya lo defini en la tabla*/

            /* accedemos a los datos que tiene el formulario modal */

            let inputId = editaModal.querySelector('.modal-body #id') /* querySelector('.modal-body #id') significa que de mi ventana modal busque el elemento que tenga como class modal-body y dentro del elemento busca al elemento que tenga como id/# el "id" */
            let inputNombre = editaModal.querySelector('.modal-body #nombre')
            let inputDescripcion = editaModal.querySelector('.modal-body #descripcion')
            let inputGenero = editaModal.querySelector('.modal-body #genero')

            /* hacemos una consulta a la base de datos con AJAX, para que me retorne la info que quiero solicitar*/

            let url = "getPelicula.php"   /* creamos una ruta a la cual vamos a hacer la peticion */
            let formData = new FormData() /* con esto pasamos los datos */
            formData.append('id', id) /* con esto agregamos los elementos que necesitamos enviar */ /* identificamos y le mandamos la variable */

            fetch(url, { /* consulta AJAX */ /* enviamos la url */
                method: "POST", /* metodo */
                body: formData /* enviamos la informacion */
            }).then(response => response.json()) /* el response sea un .json */
            .then(data => { /* lo q nos arroje este en una variable que se llame "data" */
                inputId.value = data.id /* los datos de mi registro van a tener cada unos de estos registros */
                inputNombre.value = data.nombre
                inputDescripcion.value = data.descripcion
                inputGenero.value = data.id_genero
                }).catch(err => console.log(err)) /* manejamos los errores */
        }

        )

    </script>

<script src="../../assets/js/bootstrap.bundle.min.js" ></script>
</body>
</html>