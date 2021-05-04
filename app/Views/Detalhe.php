<?php

$this->tituloPagina = "Detalhe";

include "Header.php";

use Utils\Utils;

Utils::usuarioLogado();

?>
<h2>Detalhes da Mesa <?php echo $this->detalhes['id']?></h2>

<?php

if($this->detalhes['ativo'] == '1'){
    ?>
    <form action="/public/comanda/finaliza" method="post">
        <div class="detail">
            <div class="mesas_home">
                <?php
                echo "<img src='../../../src/images/garcom.png' alt=''> ".$this->detalhes['garcom'];
                ?>
                <input type="hidden" name="id" value="<?php echo $this->detalhes['id'] ?>">
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
            <br><br>
            <button class="btn btn-danger">Finalizar Comanda</button>
        </div>
    </form>
    <?php
}else{
    ?>
    <div class="nova-comanda">
        <h4>Não existem comandas para essa mesa. Cadastre uma nova abaixo</h4>
        <form class="form-control" action="/public/comanda/cadastro" method="post">
            <label for="mesa">Mesa: </label>
            <input name="mesa" class="form-control" id="mesa" readonly type="text" value="<?php echo $this->detalhes['id']?>">
            
            <label for="garcom">Garçom: </label>
            <select class="form-select" name="garcom">
            <?php
                foreach (Utils::getSelectParams('garcom') as $garcom) {
                    ?>
                        <option value="<?php echo $garcom['id'] ?>"><?php echo $garcom['nome'] ?></option>
                    <?php
                }
            ?>
        </select>

            <label for="ocupantes">Ocupantes: </label>
            <input name="ocupantes" class="form-control" id="ocupantes" type="text" placeholder="Ex: 4">
            
            <br>
            
            <button class="btn btn-success">Cadastrar</button>
        </form>
    </div>
    <?php
    
}

include "Footer.php";