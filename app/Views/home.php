<div class="container mt-5">
    <?php if (session()->getFlashdata('login_error')): ?>
        <div class="alert alert-danger" role="alert">
            <?= session()->getFlashdata('login_error') ?>
        </div>
    <?php endif; ?>
    <h1 class="mb-4" style="text-align: center;">La Red Social</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h2>Iniciar sesión</h2>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('user/login') ?>" method="POST" accept-charset="utf-8">
                        <div class="form-group">
                            <label for="login">Nombre de usuario</label>
                            <input type="text" class="form-control" name="login" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Entrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="mt-3 text-center">
    <p>¿No tienes cuenta? <a href="<?= base_url('user/register') ?>">Regístrate aquí</a></p>
</div>