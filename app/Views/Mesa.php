<?php

$this->tituloPagina = "Mesas";

include "Header.php";

use Utils\Utils;

?>



<div class="container">
    <h2>Manutenção de Mesas</h2>
<br>
    <article class="grid-wrap">
        <div class="card">
            <div class="card-body">
            <h3>Alterar Quantidade</h3>
            <p>Hoje você possui <strong><?php echo $this->params['qtdMesas'] ?></strong> mesas cadastradas
                para unidade <strong><?php echo $this->params['unidade'] ?></strong></p>
            <a class="btn btn-secondary" href="">Alterar</a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
            <h3>Consultar Mesas Ocupadas</h3>
            <p>Existem, nesse momento, <strong><?php echo $this->params['mesasAtivas'] ?></strong> mesas ocupadas.</p>
            <a class="btn btn-secondary" href="">Consultar</a>
            </div>
        </div>
    </article>

</div>

<?php include 'Footer.php'; ?>