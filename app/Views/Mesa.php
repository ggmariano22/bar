<?php

$this->tituloPagina = "Mesas";

include "Header.php";

use Utils\Utils;

Utils::usuarioLogado();

?>

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

<div class="mesa-cadastro">
    <form class="form-control" action="/public/mesas" method="post">
        <label for="qtd_mesa">Quantidade de mesas:</label>
        <input type="text" placeholder="Ex: 14" name="qtd_mesa" id="qtd_mesa">
        
        <br><br>

        <select class="form-select" name="unidade">
            <?php
                foreach (Utils::getSelectParams('unidade') as $unidade) {
                    ?>
                        <option name="id_unidade" value="<?php echo $unidade['id'] ?>"><?php echo $unidade['descricao'] ?></option>
                    <?php
                }
            ?>
        </select>

        <br>

        <button class="btn btn-success" id="btn">Cadastrar</button>
    </form>
</div>

<?php include 'Footer.php'; ?>