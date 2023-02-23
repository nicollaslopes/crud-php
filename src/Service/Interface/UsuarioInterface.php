<?php

namespace MyApp\Service\Interface;

interface UsuarioInterface
{
    public static function incluirUsuario(string $emailUsuario, string $senhaUsuario): void;
    public static function verificaExistenciaUsuario(string $emailUsuario): bool;
}