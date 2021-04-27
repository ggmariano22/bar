<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bariano | <?php echo isset($this->tituloPagina) ? $this->tituloPagina : ""; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="../src/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <div class="collapse" id="navbarToggleExternalContent">
        <div class="bg-dark p-4">
        <p class="text-muted">Opções disponívels dentro do sistema:</p>
        <?php if($_SERVER['REQUEST_URI'] == '/public') {
            ?>
            <a class="btn btn-secondary" href="/public/mesas">Mesas</a>
            <a class="btn btn-secondary" href="">Garçom</a>
            <a class="btn btn-secondary" href="">Produtos</a>
            <?php
        }else {
            ?>
            <a class="btn btn-secondary" href="/public">Home</a>
            <a class="btn btn-secondary" href="/public/mesas">Mesas</a>
            <a class="btn btn-secondary" href="">Garçom</a>
            <a class="btn btn-secondary" href="">Produtos</a>
            <?php
        } ?>
        </div>
    </div>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        </div>
    </nav>
</head>
<body>