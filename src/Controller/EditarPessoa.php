<?php

require_once '../../vendor/autoload.php';

use MyApp\Service\EditarPessoaService;

class Pessoa 
{
    public static function editarPessoa(): void
    {
        $arrayDadosPessoa = [];
        $dataAtualizacao = date('Y-m-d H:i:s');

        array_push($arrayDadosPessoa, $_POST);
        array_push($arrayDadosPessoa, $dataAtualizacao);

        EditarPessoaService::editarPessoa($arrayDadosPessoa);
    }
}

if (isset($_POST['idPessoa'])) {
    Pessoa::editarPessoa();
    header('Location: ../view/painel.php');
}

?>

