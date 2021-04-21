<?php

require_once "Header.php";

use Utils\Utils;

var_dump($this->categories);
exit;

?>

<h2>Bem-vindo ao Bar do Mariano</h2>

<p>Confira os produtos disponíveis para consumo:</p>

<?php foreach ($this->produtos as $key => $value): ?>
   
    <ul> <?php echo ucfirst($key) ?></ul>
        <?php foreach ($value as $key => $value) : ?>
            <li><?php echo ucfirst($key).': '. Utils::moneyFormat($value)?>
        <?php endforeach; ?>

<?php endforeach;