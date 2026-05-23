<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <?php if (session()->has('errors')): ?>
                <div class="alert alert-danger shadow-sm" style="border-radius: 12px;">
                    <ul class="mb-0">
                        <?php foreach (session('errors') as $error): ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            <?php endif ?>

            <div class="card shadow-sm border-0" style="border-radius: 16px;">
                <div class="card-body p-4">
                    <h3 class="font-weight-bold mb-2">Crear cuenta</h3>
                    <p class="text-muted mb-4">Únete a nuestra red social.</p>
                    
                    <form action="<?= base_url('user/save') ?>" method="post">
                        <div class="form-group mb-3">
                            <label class="font-weight-bold small">Nombre completo</label>
                            <input type="text" name="name" class="form-control" 
                                   placeholder="Jose Perez" value="<?= old('name') ?>" required>
                        </div>

                        <div class="form-group mb-3">
                            <label class="font-weight-bold small">Nombre de usuario</label>
                            <input type="text" name="login" class="form-control" 
                                   placeholder="perez.321" 
                                   pattern="[a-zA-Z0-9._-]+" 
                                   title="Solo letras, números, puntos, guiones y sin espacios"
                                   value="<?= old('login') ?>" required>
                            <small class="text-muted">Sin espacios. Solo letras, números, puntos (.) y guiones (- _)</small>
                        </div>

                        <div class="form-group mb-4">
                            <label class="font-weight-bold small">Contraseña</label>
                            <input type="password" name="password" class="form-control" 
                                   placeholder="Mínimo 6 caracteres" required>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block font-weight-bold" style="border-radius: 10px;">
                            Registrarse ahora
                        </button>
                    </form>

                    <div class="mt-4 text-center">
                        <p class="mb-0 small">¿Ya tienes cuenta? <a href="<?= base_url() ?>">Inicia sesión</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>