<?php

require_once "Header.php";

use Utils\Utils;


?>

<h2>Bem-vindo ao Bar do Mariano</h2>

<p>Confira os produtos disponíveis para consumo:</p>

<?php foreach ($this->categories as $key => $value): ?>

    <ul> <?php echo '<strong>'.ucfirst($key).'</strong>' ?></ul>
        <?php foreach ($value as $produtos) : ?>
            <li><?php echo ucfirst($produtos['produto']).': '. Utils::moneyFormat($produtos['valor'])?>
        <?php endforeach; ?>

<?php endforeach;