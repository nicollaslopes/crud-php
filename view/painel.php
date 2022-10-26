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
      <div class="col">Editar</div>
      <div class="col">Excluir</div>
      <div class="w-100"></div>
      <br>

      <?php 
        foreach($dadosPessoa as $dadoPessoa) {
            $idPessoa = $dadoPessoa['id'];
            echo "<div class='col'>" . $dadoPessoa['nome'] . "</div>";
            echo "<div class='col'>" . $dadoPessoa['cpf'] . "</div>";
            echo "<div class='col'>" . $dadoPessoa['rg'] . "</div>";
            echo "<div class='col'>" . $dadoPessoa['cep'] . "</div>";
            echo "<div class='col'>" . $dadoPessoa['telefone'] . "</div>";
            echo "<div class='col'>";
            echo "<button type='button' data-id='{$idPessoa}' class='btn btn-default btn-warning' data-toggle='modal' data-target='#modalEdicao'>Editar</button>";
            echo "</div>";
            echo "<div class='col'>";
            echo "<button type='button' data-id='{$idPessoa}' class='btn btn-default btn-danger' data-toggle='modal' data-target='#modalExclusao'>Excluir</button>";
            echo "</div>";
            echo "<div class='w-100'></div>";
            echo "<br>";
            
        }
      ?>

    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalEdicao" tabindex="-1" role="dialog" aria-labelledby="modalEdicaoLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEdicaoLabel">Editar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-warning">Editar</button>
      </div>
    </div>
  </div>
</div> 

<!-- Modal -->
<div class="modal fade" id="modalExclusao" tabindex="-1" role="dialog" aria-labelledby="modalExclusaoLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <form action="../controller/excluirPessoa.php" method="POST>
          <h5 class="modal-title" id="modalExclusaoLabel">Excluir</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Deseja realmente excluir este cadastro?
        </div>
      
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          <button type="submit" class="btn btn-danger">Excluir</button>
      </form>
      </div>
    </div>
  </div>
</div> 


</body>
</html>

<script>

$('#myModal').on('shown.bs.modal', function (event) {
  $('#myInput').trigger('focus')

  const button = $(event.relatedTarget)
  const idPessoa = button.data("id");

})
    
</script>