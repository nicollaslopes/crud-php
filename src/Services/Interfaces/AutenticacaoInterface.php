<?php

namespace MyApp\Services\Interfaces;

interface AutenticacaoInterface
{
    public static function verificaLoginUsuario($emailUsuario, $senhaUsuario): bool;
    public static function getHashUsuario($emailUsuario): string;
}