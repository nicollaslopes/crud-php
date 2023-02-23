<?php

  session_start();

  if(!isset($_SESSION['logado'])) {
    header('Location: ../index.php');
  }

  require_once('../Controller/pessoa.php');
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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container-fluid">

  <h1></h1>
  <form action="cadastroPessoa.php">
    <div class="row">
          <div class="col-12"><input type="submit" class="btn float-left btn-primary" value="Cadastrar pessoa"></div>
      </div>
    <br>
  </form>
  <form action="../Controller/SessaoController.php">
    <div class="row">
          <div class="col-12"><input type="submit" class="btn float-right btn-success" value="Sair"></div>
      </div>
    <br>
  </form>

  <!-- <div class="container-fluid"> -->
    
    <table class="table table-hover table-striped table-bordered">
      <tr>
      <th>Nome</th>
      <th>CPF</th>
      <th>RG</th>
      <th>Data de nascimento</th>
      <th>Editar</th>
      <th>Excluir</th>
      </tr>

      <?php 
        foreach($dadosPessoa as $dadoPessoa) {
            $idPessoa = $dadoPessoa['id'];
            echo "<tr>";
            echo "<td>" . $dadoPessoa['nome'] . "</td>";
            echo "<td>" . $dadoPessoa['cpf'] . "</td>";
            echo "<td>" . $dadoPessoa['rg'] . "</td>";
            echo "<td>" . $dadoPessoa['data_nascimento'] . "</td>";
            echo "<td>";
            echo "<button type='button' data-id='{$idPessoa}' 
                                        data-nome-id='{$dadoPessoa['nome']}' 
                                        data-cpf-id='{$dadoPessoa['cpf']}'
                                        data-rg-id='{$dadoPessoa['rg']}'
                                        data-dtnascimento-id='{$dadoPessoa['data_nascimento']}'
              class='btn btn-default btn-warning' data-toggle='modal' data-target='#modalEdicao'>Editar</button>";
            echo "</td>";
            echo "<td>";
            echo "<button type='button' data-id='{$idPessoa}' class='btn btn-default btn-danger' data-toggle='modal' data-target='#modalExclusao'>Excluir</button>";
            echo "</td>";
            echo "</tr>";
            echo "<br>";
            
        }
      ?>

      </table>

    </div>
  </div>
</div>

<?php

require_once('modalEdicao.html');
require_once('modalExclusao.html');