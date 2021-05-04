<?php

$this->tituloPagina = "Garcom";

include "Header.php";

use Utils\Utils;

Utils::usuarioLogado();

?>

<h2>Cadastro e Manutenção de Garçons</h2>

<div class="novo-garcom">
    <form class="form-control" action="/public/garcom" method="post">
        <label for="nome">Nome do Garçom: </label>
        <input type="text" name="nome" id="nome">
        
        <br><br>

        <select class="form-select" name="id_unidade">
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

<br><br>

<h2>Garçons Cadastrados</h2>

<br>

<table class="table">
            <tr>
                <th scope="col">Cód.</th>    
                <th scope="col">Nome</th>
                <th scope="col">Unidade</th>
                <th scope="col">Ativo</th>
            </tr>

<?php
foreach ($this->garcons as $garcom) {
    ?>
            <tr>
                <td><?php echo $garcom['id'] ?></td>
                <td><?php echo $garcom['nome'] ?></td>
                <td><?php echo $garcom['id_unidade'] ?></td>
                <td><?php echo $garcom['ativo'] ? 'Sim' : 'Não' ?></td>
            </tr>
    <?php
}
?>
</table>



<?php include "Footer.php";