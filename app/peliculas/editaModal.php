<!-- Modal -->
<div class="modal fade" id="editaModal" tabindex="-1" aria-labelledby="editaModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editaModalLabel">Editar registro</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="actualiza.php" method="post" enctype="multipart/form-data">

            <input type="hidden" id="id" name="id"> <!-- hidden significa que no tiene ningun valor,  para poder editar, va hacia el query selector del index -->

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripcion:</label>
                <textarea name="descripcion" id="descripcion" class="form-control" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="genero" class="form-label">Género:</label>
                <select name="genero" id="genero" class="form-select" style="cursor: pointer;" required>
                    <option value="">Seleccionar...</option>
                    <?php while ($row_genero = $generos->fetch_assoc()) { ?>
                      <option value="<?php echo $row_genero["id"]; ?>"><?= $row_genero["nombre"]?> </option>
                    <?php }?> 
                </select>
            </div>

            <div class="mb-3">
              <img id="img_poster" alt="imagen del poster" width="100">
            </div>
  
            <div class="mb-3">
                <label for="poster" class="form-label">Poster:</label>
                <input type="file" name="poster" id="poster" class="form-control" >
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="Submit" class="btn btn-primary" style="text-wrap: nowrap;border-right-width: thick;"><svg xmlns="http://www.w3.org/2000/svg" style="padding-right: 7px;max-width: 17px;align-content: flex-start;" viewBox="0 0 448 512"><path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V173.3c0-17-6.7-33.3-18.7-45.3L352 50.7C340 38.7 323.7 32 306.7 32H64zm0 96c0-17.7 14.3-32 32-32H288c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V128zM224 288a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>Guardar</button>
            </div>
        </form>
      </div>

    </div>
  </div>
</div>