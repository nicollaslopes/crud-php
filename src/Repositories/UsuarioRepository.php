<?php

namespace MyApp\Repositories;

use MyApp\Model\Db;

class UsuarioRepository
{
    public static function getUsuarioByEmail(string $emailUsuario): bool
    {
        $pdo = Db::conecta();

        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
        $stmt->bindParam(':email', $emailUsuario);
        $stmt->execute();
    
        return $stmt->rowCount();
    }

    public static function getSenhaUsuarioByEmail(string $emailUsuario): array
    {
        $pdo = Db::conecta();

        $stmt = $pdo->prepare("SELECT senha FROM usuarios WHERE email = :email");
        $stmt->bindParam(':email', $emailUsuario);
        $stmt->execute();

        return $stmt->fetch();
    }

    public static function addUsuario(string $emailUsuario, string $senhaHash): void
    {
        $pdo = Db::conecta();

        $stmt = $pdo->prepare("INSERT INTO usuarios (email, senha) VALUES (:email, :senha)");
        $stmt->bindParam(':email', $emailUsuario);
        $stmt->bindParam(':senha', $senhaHash);

        $stmt->execute();
    }
}