<?php

namespace MyApp\Service;

require_once '../../vendor/autoload.php';

use MyApp\Repositories\UsuarioRepository;
use MyApp\Service\Interface\AutenticacaoInterface;

class AutenticacaoService implements AutenticacaoInterface
{
    public static function verificaLoginUsuario($emailUsuario, $senhaUsuario): bool
    {
        $usuarioValido = UsuarioRepository::getUsuarioByEmail($emailUsuario);

        if ($usuarioValido) {

            $hashUsuario = AutenticacaoService::getHashUsuario($emailUsuario);

            if (password_verify($senhaUsuario, $hashUsuario)) {
                $usuarioValido = true;
            } else {
                $usuarioValido = false;
            }
        }

        return $usuarioValido;
    }

    public static function getHashUsuario($emailUsuario): string 
    {
        $result = UsuarioRepository::getSenhaUsuarioByEmail($emailUsuario);

        return $result['senha'];
    }
}