<?php

require_once '../../vendor/autoload.php';
session_start();

use MyApp\Services\AutenticacaoService;

class AutenticacaoController
{
    public static function verificacaoLogin(): bool {

        $emailUsuario = $_POST['emailUsuario'];
        $senhaUsuario = $_POST['senhaUsuario'];

        return AutenticacaoService::verificaLoginUsuario($emailUsuario, $senhaUsuario);
    }
}

$isUsuarioLogado = AutenticacaoController::verificacaoLogin();

if ($isUsuarioLogado) {
    $_SESSION['logado'] = true;
    header('Location: ../view/painel.php');
} else {
    header('Location: ../index.php');
}
