<div class="container mt-5">
    <div class="row mb-4 align-items-center">
        <div class="col-md-12">
            <h1>Perfil de <?= $user_name ?></h1>
            <p class="text-muted">Este es tu espacio personal. Aquí puedes ver tu galería de fotos y tus publicaciones de texto.</p>
        </div>
    </div>

    <?= view('partials/composer') ?>

    <hr class="mb-5">

    <h3 class="mb-4">Mis publicaciones</h3>

    <div class="row">
        <?php if(empty($posts)): ?>
            <div class="col-12 text-center py-5">
                <h4 class="text-muted font-weight-light">Aún no has compartido nada desde tu cuenta.</h4>
            </div>
        <?php else: ?>
            <?php foreach($posts as $item): ?>
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="card h-100 shadow-sm border-0" style="border-radius: 16px; overflow: hidden; background: #fff;">
                        
                        <?php if(!empty($item['image_name'])): ?>
                            <img src="<?= base_url('uploads/gallery/' . $item['image_name']) ?>" 
                                 class="card-img-top" 
                                 style="height: 220px; object-fit: cover;">
                        <?php endif; ?>

                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <p class="card-text text-dark <?= empty($item['image_name']) ? 'font-weight-bold font-size-lg' : '' ?>" style="font-size: 1.05rem;">
                                    <?= $item['content'] ?>
                                </p>
                                <small class="text-muted d-block mb-3">
                                    Publicado el: <?= date('d/m/Y', strtotime($item['posted_time'])) ?>
                                </small>
                            </div>
                            
                            <div class="text-right border-top pt-2">
                                <a class="btn btn-outline-primary btn-sm px-3" style="border-radius: 15px;" href="<?= base_url('publication/edit/'.$item['id']); ?>">Editar</a>
                                <a class="btn btn-outline-danger btn-sm px-3" style="border-radius: 15px;" href="<?= base_url('publication/delete/'.$item['id']); ?>" onclick="return confirm('¿Seguro que quieres eliminar esta publicación?')">Borrar</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>