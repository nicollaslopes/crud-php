<?php

namespace MyApp\Service;

require_once '../../vendor/autoload.php';

use MyApp\Model\Db;
use MyApp\Service\Interface\AutenticacaoInterface;


class AutenticacaoService implements AutenticacaoInterface
{
    public static function verificaLoginUsuario($emailUsuario, $senhaUsuario): bool
    {

        $pdo = Db::conecta();

        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
        $stmt->bindParam(':email', $emailUsuario);
        $stmt->execute();
    
        $usuarioValido = $stmt->rowCount();

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

    public static function getHashUsuario($emailUsuario): string {

        $pdo = Db::conecta();

        $stmt = $pdo->prepare("SELECT senha FROM usuarios WHERE email = :email");
        $stmt->bindParam(':email', $emailUsuario);

        $stmt->execute();
        $result = $stmt->fetch();
        
        return $result['senha'];

    }
}