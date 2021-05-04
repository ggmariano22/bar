<?php

$this->tituloPagina = 'Produtos';

include "Header.php";

use Utils\Utils;

Utils::usuarioLogado();

?>

<h2>Produtos</h2>

<div class="form-produtos">
    <form class="form-control" action="/public/produtos" method="post">
        <label for="categoria">Categoria: </label>
        <input type="text" id="categoria" name="id_tipo">

        <label for="descricao">Descrição: </label>
        <input type="text" id="descricao" name="descricao">

        <label for="descricao">Valor: </label>
        <input type="text" id="valor" name="valor">

        <button class="btn btn-success">Cadastrar</button>
    </form>
</div>

<div class="produtos">
    <?php foreach ($this->categories as $key => $value): ?>
        <?php echo '<h3>'.ucfirst($key).'</h3>' ?>
        <table class="table">
            <tr>
                <th scope="col">Cód.</th>    
                <th scope="col">Descricao</th>
                <th scope="col">Valor</th>
                <th scope="col">Ações</th>
            </tr>
            <?php foreach ($value as $produtos) : ?>
                <tr>
                    <td><?php echo $produtos['id'] ?></td>
                    <td><?php echo $produtos['produto'] ?></td>
                    <td><?php echo Utils::moneyFormat($produtos['valor']) ?></td>
                    <td><a class="btn btn-primary" href="/public/produtos/editar">Editar</a>
                        <?php echo "<a class='btn btn-danger' href='/public/produtos/apagar/".$produtos['id']."'>Apagar</a></td>"; ?>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endforeach; ?>
</div>

<?php include "Footer.php";