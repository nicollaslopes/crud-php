<?php

require_once '../../vendor/autoload.php';

use MyApp\Service\PessoaService;

class PessoaController
{
    public static function editarPessoa(): void
    {
        $arrayDadosPessoa = [];
        $dataAtualizacao = date('Y-m-d H:i:s');

        array_push($arrayDadosPessoa, $_POST);
        array_push($arrayDadosPessoa, $dataAtualizacao);

        PessoaService::editarPessoa($arrayDadosPessoa);
    }

    public static function excluirPessoa(): void {

        $idPessoa = $_POST['idPessoa'];
        
        PessoaService::excluirPessoa($idPessoa);
    }
}

if ($_POST['acao'] === 'editar') {
    PessoaController::editarPessoa();
    header('Location: ../view/painel.php');
}

if ($_POST['acao'] === 'excluir') {
    PessoaController::excluirPessoa();
    header('Location: ../view/painel.php');
}

?>

