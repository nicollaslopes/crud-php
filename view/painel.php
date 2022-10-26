<?php

    require_once('../controller/pessoa.php');

    $dadosPessoa = Pessoa::listarPessoa();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Painel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container-fluid">

  <h1>CRUD</h1>
  <form action="cadastroPessoa.html">
    <div class="row">
          <div class="col-12"><input type="submit" class="btn float-right btn-primary" value="Cadastrar pessoa"></div>
      </div>
    <br>
  </form>

  <div class="container-fluid">
    
    <div class="row">
      <!-- <div class="col">Id</div> -->
      <div class="col">Nome</div>
      <div class="col">CPF</div>
      <div class="col">RG</div>
      <div class="col">CEP</div>
      <div class="col">Telefone</div>
      <div class="w-100"></div>

      <?php 
        foreach($dadosPessoa as $dadoPessoa) {
            echo "<div class='col'>" . $dadoPessoa['nome'] . "</div>";
            echo "<div class='col'>" . $dadoPessoa['cpf'] . "</div>";
            echo "<div class='col'>" . $dadoPessoa['rg'] . "</div>";
            echo "<div class='col'>" . $dadoPessoa['cep'] . "</div>";
            echo "<div class='col'>" . $dadoPessoa['telefone'] . "</div>";
            echo "<div class='w-100'></div>";
        }
      ?>

    </div>
  </div>
</div>

</body>
</html>
