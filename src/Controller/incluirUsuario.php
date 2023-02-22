<?php

require_once '../../vendor/autoload.php';

use MyApp\Model\Db;

class Pessoa {

    public static function incluirUsuario(): void {

        $senhaUsuario = $_POST['senhaUsuario'];
        $emailUsuario = $_POST['emailUsuario'];

        $opcaoHash = [
            'cost' => 12,
        ];

        $existeUsuario = Pessoa::verificaExistenciaUsuario($emailUsuario);
        
        if ($existeUsuario == false) {
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

    public static function verificaExistenciaUsuario($emailUsuario): bool {

        $pdo = Db::conecta();

        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");

        $stmt->bindParam(':email', $emailUsuario);

        $stmt->execute();

        return $stmt->rowCount() == 1 ? true : false;

    }

}

if (isset($_POST['senhaUsuario']) && isset($_POST['emailUsuario'])) {
    Pessoa::incluirUsuario();
}

?>

