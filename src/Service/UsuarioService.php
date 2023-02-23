<?php

namespace MyApp\Service;

require_once '../../vendor/autoload.php';

use MyApp\Model\Db;
use MyApp\Service\Interface\UsuarioInterface;

class UsuarioService implements UsuarioInterface
{
    public static function incluirUsuario(string $emailUsuario, string $senhaUsuario): void
    {
        $existeUsuario = UsuarioService::verificaExistenciaUsuario($emailUsuario);
        
        if (!$existeUsuario) {
            
            $opcaoHash = ['cost' => 12];
            $senhaHash = password_hash($senhaUsuario, PASSWORD_BCRYPT, $opcaoHash);

            $pdo = Db::conecta();
            $stmt = $pdo->prepare("INSERT INTO usuarios (email, senha) VALUES (:email, :senha)");
            $stmt->bindParam(':email', $emailUsuario);
            $stmt->bindParam(':senha', $senhaHash);
    
            $stmt->execute();
        } else {
            // to do: implementar mensagem de erro de usuário existente
        }
    }

    public static function verificaExistenciaUsuario(string $emailUsuario): bool 
    {
        $pdo = Db::conecta();
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
        $stmt->bindParam(':email', $emailUsuario);
        $stmt->execute();

        return $stmt->rowCount() == 1 ? true : false;
    }
}