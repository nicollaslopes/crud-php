<?php

namespace MyApp\Utils;

class Sessao
{
    public static function excluirSessao(): void
    {
        session_start();
        session_destroy();
    }
}