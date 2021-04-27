<?php

$this->tituloPagina = "Home";

include "Header.php";

use Utils\Utils;


?>

<div class="container">
    <h2>Bem-vindo ao Bar do Mariano</h2>
    
    <?php foreach ($this->mesas as $mesa) :
        
        ?> <div class="mesas_home"> <?php
        echo $mesa['ativo'] == 0 ? "<a href='#'><img src='../src/images/green.png' alt=''></a>"
                                : "<a href='#'><img src='../src/images/red.png' alt=''></a>";
        echo "<p>Cód. de mesa: ".$mesa['id']."</p>";
        echo "<p>Atendido por: ".$mesa['garcom']."</p>";
        ?> </div> <?php
        
        endforeach; ?>

    <?php foreach ($this->categories as $key => $value): ?>

        <ul> <?php echo '<br><strong>'.ucfirst($key).'</strong>' ?></ul>
            <?php foreach ($value as $produtos) : ?>
                <li><?php echo ucfirst($produtos['produto']).': '. Utils::moneyFormat($produtos['valor'])?>
            <?php endforeach; ?>

    <?php endforeach; ?>

</div>

<?php include 'Footer.php'; ?>