<div class="container mt-5">
    <?php 
    // Verificamos si el ID del usuario en sesión coincide con el dueño de la publicación
    if(session()->get('user_id') == $publicacion['user_id']): 
    ?>
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4>Actualizar publicación</h4>
            </div>
            <div class="card-body">
                <form action="<?= base_url('publication/update') ?>" method="post">
                    <input type="hidden" name="id" value="<?= $publicacion['id'] ?>">
                    <input type="hidden" name="user_id" value="<?= $publicacion['user_id'] ?>">
                    
                    <div class="form-group">
                        <label>Contenido:</label>
                        <textarea class="form-control" name="content" rows="3" placeholder="Escribe algo"><?= $publicacion['content'] ?></textarea>
                    </div>

                    <div class="form-group">
                        <label>Visibilidad:</label>
                        <select name="visibility" class="form-control">
                            <option value="public" <?= $publicacion['visibility'] == 'public' ? 'selected' : '' ?>>Pública</option>
                            <option value="private" <?= $publicacion['visibility'] == 'private' ? 'selected' : '' ?>>Privada</option>
                        </select>
                    </div>
                    <div class="text-right mt-3">
                        <a href="<?= base_url('publication') ?>" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    <?php else: ?>
        <div class="alert alert-danger" role="alert">
            <strong>Error:</strong> No tienes permiso para editar esta publicación.
        </div>
        <div class="text-center">
            <a href="<?= base_url('publication') ?>" class="btn btn-outline-primary">Regresar al muro</a>
        </div>
    <?php endif; ?>
</div>