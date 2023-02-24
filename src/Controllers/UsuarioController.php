<?php

require_once '../../vendor/autoload.php';

use MyApp\Services\UsuarioService;

class UsuarioController 
{
    public static function incluirUsuario(): void 
    {

        $emailUsuario = $_POST['emailUsuario'];
        $senhaUsuario = $_POST['senhaUsuario'];

        UsuarioService::incluirUsuario($emailUsuario, $senhaUsuario);
    }
}

if (isset($_POST['senhaUsuario']) && isset($_POST['emailUsuario'])) {
    UsuarioController::incluirUsuario();
}

?>

