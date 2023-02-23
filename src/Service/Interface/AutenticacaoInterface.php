<?php

namespace MyApp\Service\Interface;

use MyApp\Service\AutenticacaoService;

interface AutenticacaoInterface
{
    public static function verificaLoginUsuario($emailUsuario, $senhaUsuario): bool;
    public static function getHashUsuario($emailUsuario): string;
}