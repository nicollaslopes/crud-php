<?php

  session_start();

  if(!isset($_SESSION['logado'])) {
    header('Location: ../index.php');
  }

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
  <script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"
    ></script>
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
      <div class="col">Data de nascimento</div>
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
            echo "<div class='col'>" . $dadoPessoa['data_nascimento'] . "</div>";
            echo "<div class='col'>";
            echo "<button type='button' data-id='{$idPessoa}' 
                                        data-nome-id='{$dadoPessoa['nome']}' 
                                        data-cpf-id='{$dadoPessoa['cpf']}'
                                        data-rg-id='{$dadoPessoa['rg']}'
                                        data-dtnascimento-id='{$dadoPessoa['data_nascimento']}'
              class='btn btn-default btn-warning' data-toggle='modal' data-target='#modalEdicao'>Editar</button>";
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
        <h5 class="modal-title" id="modalEdicaoLabel">Edição</h5>
        </button>
      </div>
      <div id="modal-body" class="modal-body">
        <div>
          <label for="nomePessoa" id="nomePessoaLabel">Nome</label>
          <input type="text" name="nomePessoa" id="nomePessoa" value=>
        </div>
        <div>
          <label for="cpfPessoa" id="cpfPessoaLabel">CPF</label>
          <input type="text" name="cpfPessoa" id="cpfPessoa" >
        </div>
        <div>
          <label for="rgPessoa" id="rgPessoaLabel">RG</label>
          <input type="text" name="rgPessoa" id="rgPessoa" >
        </div>
        <div>
          <label for="dtnascimentoPessoa" id="dtnascimentoPessoaLabel">Data de nascimento</label>
          <input type="date" name="dtnascimentoPessoa" id="dtnascimentoPessoa">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="submit" id="botaoEdicao" class="btn btn-warning">Editar</button>
      </div>
    </div>
  </div>
</div> 

<!-- Modal -->
<div class="modal fade" id="modalExclusao" tabindex="-1" role="dialog" aria-labelledby="modalExclusaoLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="modalExclusaoLabel">Exclusão</h5>
          </button>
        </div>
        <div class="modal-body">
          Deseja realmente excluir este cadastro?
        </div>
      
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          <button type="submit" id="botaoExclusao" data-dismiss="modal" class="btn btn-danger">Excluir</button>
      </div>
    </div>
  </div>
</div> 

</body>
</html>

<script>

$('#modalExclusao').on('shown.bs.modal', function (event) {
  $('#myInput').trigger('focus')

  const button = $(event.relatedTarget)
  const idPessoa = button.data("id");
  const dadosPessoa = {idPessoa: idPessoa};

  $("#botaoExclusao").on('click', function() {

    const url = '../controller/excluirPessoa.php';

    $.ajax({
        type: 'POST',
        url: url,
        data: dadosPessoa,
        dataType: 'html',
        success: function (data) {
          window.location.reload();
        }
    });
  });

})
    
</script>

<script>
$('#modalEdicao').on('shown.bs.modal', function (event) {
  $('#myInput').trigger('focus')

  const button = $(event.relatedTarget)
  const idPessoa = button.data("id");

  $("#nomePessoa").val(button.data("nome-id"))
  $("#cpfPessoa").val(button.data("cpf-id"))
  $("#rgPessoa").val(button.data("rg-id"))
  $("#dtnascimentoPessoa").val(button.data("dtnascimento-id"))
  
  $("#botaoEdicao").on('click', function() {

    const nomePessoa = $("#nomePessoa").val()
    const cpfPessoa = $("#cpfPessoa").val()
    const rgPessoa = $("#rgPessoa").val()
    const dtnascimentoPessoa = $("#dtnascimentoPessoa").val()

    const dadosPessoa = {
            idPessoa: idPessoa, 
            nomePessoa: nomePessoa,
            cpfPessoa: cpfPessoa,
            rgPessoa: rgPessoa,
            dtnascimentoPessoa: dtnascimentoPessoa
          };

    const url = '../controller/editarPessoa.php';

    $.ajax({
        type: 'POST',
        url: url,
        data: dadosPessoa,
        dataType: 'html',
        success: function (data) {
          window.location.reload();
        }
    });
  });

})
    
</script>