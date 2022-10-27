<?php

    session_start();

    require('../model/db.php');

    $emailUsuario = $_POST['emailUsuario'];
    $senhaUsuario = $_POST['senhaUsuario'];

    class Autenticacao {

        public static function verificaLoginUsuario($emailUsuario, $senhaUsuario): bool {

            $pdo = Db::conecta();

            $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email AND senha = :senha");
            $stmt->bindParam(':email', $emailUsuario);
            $stmt->bindParam(':senha', $senhaUsuario);
            $a = $stmt->execute();
        
            $usuarioValido = $stmt->rowCount();

            return $usuarioValido;
        }

    }

    $isUsuarioLogado = Autenticacao::verificaLoginUsuario($emailUsuario, $senhaUsuario);

    if ($isUsuarioLogado) {
        $_SESSION['logado'] = true;
        header('Location: ../view/painel.php');
    } else {
        header('Location: ../index.php');
    }
