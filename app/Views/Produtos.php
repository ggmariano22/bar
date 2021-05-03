<?php

include "Header.php";

use Utils\Utils;

?>

<h2>Produtos</h2>

<div class="produtos">
    <?php foreach ($this->categories as $key => $value): ?>
        <?php echo '<h3>'.ucfirst($key).'</h3>' ?>
        <table class="table">
            <tr>
                <th scope="col">Cód.</th>    
                <th scope="col">Descricao</th>
                <th scope="col">Valor</th>
            </tr>
            <?php foreach ($value as $produtos) : ?>
                <tr>
                    <td><?php echo $produtos['id'] ?></td>
                    <td><?php echo $produtos['produto'] ?></td>
                    <td><?php echo Utils::moneyFormat($produtos['valor']) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endforeach; ?>
</div>

<?php include "Footer.php";