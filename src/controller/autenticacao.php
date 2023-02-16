<?php

    session_start();

    require('../model/db.php');

    $emailUsuario = $_POST['emailUsuario'];
    $senhaUsuario = $_POST['senhaUsuario'];


    class Autenticacao {

        public static function verificaLoginUsuario($emailUsuario, $senhaUsuario): bool {

            $pdo = Db::conecta();

            $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
            $stmt->bindParam(':email', $emailUsuario);
            $stmt->execute();
        
            $usuarioValido = $stmt->rowCount();

            if ($usuarioValido) {

                $hashUsuario = Autenticacao::getHashUsuario($emailUsuario);

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

    $isUsuarioLogado = Autenticacao::verificaLoginUsuario($emailUsuario, $senhaUsuario);

    if ($isUsuarioLogado) {
        $_SESSION['logado'] = true;
        header('Location: ../view/painel.php');
    } else {
        header('Location: ../index.php');
    }
