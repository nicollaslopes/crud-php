<?php

namespace MyApp\Service\Interface;

interface AutenticacaoInterface
{
    public static function verificaLoginUsuario($emailUsuario, $senhaUsuario): bool;
    public static function getHashUsuario($emailUsuario): string;
}