<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= site_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= site_url('/assets/css/style.css') ?>">

    <title><?= getenv('APP_NAME') ?></title>
</head>

<body class="bg-gray">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 bg-primary text-center pt-5 pb-5">
                <h1 class="text-light"><?= getenv('APP_NAME') ?></h1>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6 col-sm-12 col-lg-4 offset-md-3 offset-lg-4">
                <div class="card shadow-sm rounded">
                    <div class="card-header text-center text-bold fw-bold fs-4">
                        Cadastrar-se
                    </div>
                    <div class="card-body mt-4 mb-4">
                        <form action="<?= base_url(route_to('preconfig.store'))?>" method="post" autocomplete="off">
                            <?= csrf_field() ?>
                            <input type="user_name" name="user_name" class="form-control mb-3" placeholder="Nome" autofocus>
                            <input type="email" name="email" class="form-control mb-3" placeholder="E-mail">
                            <input type="password" name="password" class="form-control mb-3" placeholder="Senha">
                            <input type="confirm_password" name="confirm_password" class="form-control mb-3" placeholder="Confirmar Senha">
                            <div class="d-grid mb-3">
                                <button class="btn btn-primary">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>