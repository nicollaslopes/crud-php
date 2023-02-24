<?php

namespace MyApp\Services;

require_once '../../vendor/autoload.php';

use MyApp\Repositories\UsuarioRepository;
use MyApp\Services\Interfaces\UsuarioInterface;

class UsuarioService implements UsuarioInterface
{
    public static function incluirUsuario(string $emailUsuario, string $senhaUsuario): void
    {
        $existeUsuario = UsuarioService::verificaExistenciaUsuario($emailUsuario);
        
        if (!$existeUsuario) {
            
            $opcaoHash = ['cost' => 12];
            $senhaHash = password_hash($senhaUsuario, PASSWORD_BCRYPT, $opcaoHash);

            UsuarioRepository::addUsuario($emailUsuario, $senhaHash);
        }
    }

    public static function verificaExistenciaUsuario(string $emailUsuario): bool 
    {
        $usuario = UsuarioRepository::getUsuarioByEmail($emailUsuario);

        return $usuario == 1 ? true : false;
    }
}