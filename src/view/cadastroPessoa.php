<?php

require_once '../../vendor/autoload.php';
use MyApp\Utils\Sessao;

Sessao::verificaSePossuiSessao();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Painel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/cadastroPessoa.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>

</head>
<body>

<form action="../Controller/PessoaController.php" method="POST">
    <section class="h-100 h-custom gradient-custom-2">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12">
            <div class="card card-registration card-registration-2" style="border-radius: 15px;">
            <div class="card-body p-0">
                <div class="row g-0">
                <div class="col-lg-6">
                    <div class="p-5">
                    <h3 class="fw-normal mb-5" style="color: #4835d4;">Informações gerais</h3>

                    <div class="row">

                        <div class="col-md-12 mb-4 pb-2">
                            <div class="form-outline">
                                <input type="text" id="nomePessoa" name="nomePessoa" class="form-control form-control-lg" required />
                                <label class="form-label" for="nomePessoa">Nome</label>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4 pb-2">
                            <div class="form-outline">
                                <input type="date" id="dtNascimentoPessoa" name="dtNascimentoPessoa" class="form-control form-control-lg" required />
                                <label class="form-label" for="dtNascimentoPessoa">Data de nascimento</label>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4 pb-2">
                            <div class="form-outline">
                                <input type="text" id="cpfPessoa" name="cpfPessoa" class="form-control form-control-lg" maxlength="11" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
                                <label class="form-label" for="cpfPessoa">CPF</label>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4 pb-2">
                            <div class="form-outline">
                                <input type="text" id="rgPessoa" name="rgPessoa" class="form-control form-control-lg" maxlength="10" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
                                <label class="form-label" for="rgPessoa">RG</label>
                            </div>
                        </div>

                    </div>

                    </div>
                </div>
                <div class="col-lg-6 bg-indigo text-white">
                    <div class="p-5">
                    <h3 class="fw-normal mb-5">Detalhes do contato</h3>

                    <div class="mb-4 pb-2">
                        <div class="form-outline form-white">
                        <input type="text" id="enderecoPessoa" name="enderecoPessoa" class="form-control form-control-lg" required />
                        <label class="form-label" for="enderecoPessoa">Endereço</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5 mb-4 pb-2">

                        <div class="form-outline form-white">
                            <input type="text" id="cepPessoa" name="cepPessoa" class="form-control form-control-lg" maxlength="8" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"/>
                            <label class="form-label" for="cepPessoa">CEP</label>
                        </div>

                        </div>
                        
                        <div class="col-md-4 mb-4 pb-2">
                        <div class="form-outline form-white">
                            <input type="text" id="ufPessoa" name="ufPessoa" class="form-control form-control-lg" required maxlength="2"/>
                            <label class="form-label" for="ufPessoa">UF</label>
                        </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5 mb-4 pb-2">

                        <div class="form-outline form-white">
                            <input type="text" id="numeroPessoa" name="numeroPessoa" class="form-control form-control-lg" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
                            <label class="form-label" for="numeroPessoa">Número</label>
                        </div>

                        </div>
                        <div class="col-md-7 mb-4 pb-2">

                        <div class="form-outline form-white">
                            <input type="text" id="telefonePessoa" name="telefonePessoa" class="form-control form-control-lg" required />
                            <label class="form-label" for="telefonePessoa">Telefone</label>
                        </div>

                        </div>
                    </div>

                    <button type="submit" id="cadastrar" name="cadastrar" class="btn btn-light btn-lg" data-mdb-ripple-color="dark">Cadastrar</button>
                    <input type="hidden" name="acao" value="cadastrar">

                    <div class="row">
                        <div class="col-12"><input type="submit" id="botaoSair" class="btn float-right btn-success" value="Sair"></div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </section>
</form>

<script>

    $("#botaoSair").on('click', function() {
        window.history.back();
    })    

</script>