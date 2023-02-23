<?php

namespace MyApp\Utils;

class Sessao
{
    public static function excluirSessao(): void
    {
        session_start();
        session_destroy();
    }

    public static function verificaSePossuiSessao(): void
    {
        session_start();

        if(!isset($_SESSION['logado'])) {
            header('Location: ../../../index.php');
        }
    }
}