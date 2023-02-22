<?php

require_once '../../vendor/autoload.php';

use MyApp\Model\Db;

class Pessoa {

    public static function excluirPessoa(): void {

        $idPessoa = $_POST['idPessoa'];
        
        $pdo = Db::conecta();

        $stmt = $pdo->prepare("DELETE FROM pessoas
                                WHERE id = :id");

        $stmt->bindParam('id', $idPessoa);

        $stmt->execute();

    }

}

if(isset($_POST['idPessoa'])) {
    Pessoa::excluirPessoa();
    header('Location: ../view/painel.php');
} 

?>

