<?php

$this->tituloPagina = "Detalhe";

include "Header.php";

?>
<h2>Detalhes da Comanda <?php echo $this->detalhes['id']?></h2>

<div class="detail">
    <div class="mesas_home">
        <?php
        echo "<img src='../../../src/images/garcom.png' alt=''> ".$this->detalhes['garcom'];
        ?>
    </div>

    <div class="mesas_home">
        <?php
        echo "<img src='../../../src/images/chair.png' alt=''> ".$this->detalhes['pessoas']. " Lugares";
        ?>
    </div>

    <div class="mesas_home">
        <?php
        echo "<img src='../../../src/images/produtos.png' alt=''> <br>";
        echo "<ul>";
        echo"<br>";
        foreach ($this->detalhes['produtos'] as $produtos) :
            echo "<li>$produtos</li>";
        endforeach;
        echo "</ul>"; ?>
    </div>
</div>

<?php include "Footer.php";