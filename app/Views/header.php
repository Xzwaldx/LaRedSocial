<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Para ti</title>
    
    <style>
        /* Estilos minimalistas personalizados */
        .navbar {
            border-bottom: 1px solid #f0f2f5;
        }
        .navbar-brand {
            font-size: 1.4rem;
            letter-spacing: -0.5px;
        }
        .nav-link {
            transition: color 0.2s ease-in-out;
        }
        .btn-logout {
            border-radius: 20px;
            padding: 0.375rem 1rem;
        }
    </style>
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4">
        <div class="container">
            
            <a class="navbar-brand font-weight-bold text-dark" href="<?= base_url('publication') ?>">
                Para ti
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigationBar" aria-controls="navigationBar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navigationBar">
                <ul class="navbar-nav ml-auto align-items-center">
                    
                    <?php if(session()->get('user_id')): ?>
                        
                        <li class="nav-item">
                            <a class="nav-link text-secondary font-weight-bold mx-2" href="<?= base_url('publication') ?>">
                                Muro
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-secondary font-weight-bold mx-2" href="<?= base_url('profile') ?>">
                                Mi Perfil
                            </a>
                        </li>

                        <li class="nav-item">
                            <span class="nav-link text-muted mx-2">
                                Hola, <strong class="text-dark font-weight-bold"><?= session()->get('name') ?></strong>
                            </span>
                        </li>

                        <li class="nav-item">
                            <a class="btn btn-outline-danger btn-sm btn-logout font-weight-bold ml-2" href="<?= base_url('user/logout') ?>">
                                Salir
                            </a>
                        </li>

                    <?php endif; ?>

                </ul>
            </div>

        </div>
    </nav>