<?php setlocale(LC_TIME, "esp"); ?>
<div class="container mt-4">

    <?php if (session()->get('user_id')): ?>
        <?= view('partials/composer') ?>
    <?php endif; ?>

    <h2 class="mb-3">Muro de Publicaciones</h2>

    <!-- Publicaciones -->
    <?php foreach ($posts as $item): ?>
        <div class="card bg-light mb-3">
            <div class="card-body">
                <strong class="text-primary"><?= $item['user_name']; ?></strong>
                <small class="text-muted d-block">
                    <small class="text-muted d-block">
                        <?php

                        $diasEspañol = [
                            "Sunday" => "Domingo",
                            "Monday" => "Lunes",
                            "Tuesday" => "Martes",
                            "Wednesday" => "Miércoles",
                            "Thursday" => "Jueves",
                            "Friday" => "Viernes",
                            "Saturday" => "Sábado"
                        ];

                        $mesesEspañol = [
                            "January" => "enero",
                            "February" => "febrero",
                            "March" => "marzo",
                            "April" => "abril",
                            "May" => "mayo",
                            "June" => "junio",
                            "July" => "julio",
                            "August" => "agosto",
                            "September" => "septiembre",
                            "October" => "octubre",
                            "November" => "noviembre",
                            "December" => "diciembre"
                        ];


                        $fechaUnix = strtotime($item['posted_time']);


                        $diaIngles = date('l', $fechaUnix);
                        $mesIngles = date('F', $fechaUnix);

                        // 4. Imprimimos usando nuestros arreglos en español
                        echo $diasEspañol[$diaIngles] . ", " . date('d', $fechaUnix) . " de " . $mesesEspañol[$mesIngles] . " de " . date('Y h:i A', $fechaUnix);
                        ?>
                    </small>
                </small>
                
                <p class="card-text mt-3 text-dark" style="font-size: 1.05rem;"><?= $item['content']; ?></p>

                <?php if (!empty($item['image_name'])): ?>
                    <div class="mb-3 text-center bg-dark rounded" style="overflow: hidden; max-height: 400px;">
                        <img src="<?= base_url('uploads/gallery/' . $item['image_name']) ?>" class="img-fluid"
                            style="max-height: 400px; object-fit: contain; width: 100%;">
                    </div>
                <?php endif; ?>
                <!-- Opcional: Mostrar botones de edición solo si es el dueño del post -->
                <?php if (session()->get('user_id') == $item['user_id']): ?>
                    <div class="text-right">
                        <a class="btn btn-primary btn-sm" href="<?= base_url('publication/edit/' . $item['id']); ?>"
                            role="button">Editar</a>
                        <a class="btn btn-danger btn-sm" href="<?= base_url('publication/delete/' . $item['id']); ?>"
                            role="button">Borrar</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>