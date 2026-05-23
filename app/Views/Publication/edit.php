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
                    
                    <div class="form-group">
                        <label>Contenido:</label>
                        <textarea class="form-control" name="content" rows="3" placeholder="Escribe algo"><?= $publicacion['content'] ?></textarea>
                    </div>

                    <div class="text-right">
                        <a href="<?= base_url('publication') ?>" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    <?php else: ?>
        <!-- Mensaje de error si no tiene permiso -->
        <div class="alert alert-danger" role="alert">
            <strong>Error:</strong> No tienes permiso para editar esta publicación.
        </div>
        <div class="text-center">
            <a href="<?= base_url('publication') ?>" class="btn btn-outline-primary">Regresar al muro</a>
        </div>
    <?php endif; ?>
</div>