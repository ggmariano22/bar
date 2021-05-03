<?php

$this->tituloPagina = "Home";

include "Header.php";

use Utils\Utils;

//var_dump($this->mesas);exit;


?>

<h2>Bem-vindo ao Bar do Mariano</h2>

<?php foreach ($this->mesas as $mesa) :
    
    ?> <div class="mesas_home"> <?php
    echo $mesa['ativo'] == 0 ? "<a href='/public/mesas/detalhe/".$mesa['id']."'><img src='../src/images/green.png' alt=''></a>"
                            : "<a href='/public/mesas/detalhe/".$mesa['id']."'><img src='../src/images/red.png' alt=''></a>";
    echo "<p>Cód. de mesa: ".$mesa['id']."</p>";
    echo $mesa['ativo'] == 0 ? "" : "<p>Atendido por: ".$mesa['garcom']."</p>";
    ?> </div> <?php
    
    endforeach; ?>

<?php include 'Footer.php'; ?>