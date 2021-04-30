<?php

$this->tituloPagina = 'Login';

include "Header.php"; ?>

<h1>Bem-vindo ao sistema Bariano</h1>
<h3>Realize o login abaixo para acessar as funcionalidades</h3>


<div class="login">

<form action="/public/login" method="post">
  <div class="mb-3">
    <label for="user" class="form-label">Usuario</label>
    <input type="text" class="form-control" name="user" id="user" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="pwd" class="form-label">Senha</label>
    <input type="password" class="form-control" name="pwd" id="pwd">
  </div>
  <button type="submit" class="btn btn-success">Entrar</button>
</form>

</div>


<?php include "Footer.php";