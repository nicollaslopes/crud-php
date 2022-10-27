<?php

require('../model/db.php');

class Pessoa {

    public static function editarPessoa() {

        $idPessoa = $_POST['idPessoa'];
        $nomePessoa = $_POST['nomePessoa'];
        $cpfPessoa = $_POST['cpfPessoa'];
        $dtnascimentoPessoa = $_POST['dtnascimentoPessoa'];
        $rgPessoa = $_POST['rgPessoa'];

        $pdo = Db::conecta();

        $stmt = $pdo->prepare("UPDATE 
                                    pessoas
                                SET
                                    nome = :nome,
                                    cpf = :cpf,
                                    rg = :rg,
                                    data_nascimento = :dtnascimento
                                WHERE
                                    id = :id");

        $stmt->bindParam('id', $idPessoa);
        $stmt->bindParam('nome', $nomePessoa);
        $stmt->bindParam('cpf', $cpfPessoa);
        $stmt->bindParam('rg', $rgPessoa);
        $stmt->bindParam('dtnascimento', $dtnascimentoPessoa);

        $a = $stmt->execute();

        var_dump($a);

    }

}

if(isset($_POST['idPessoa'])) {

    echo "editando";
    Pessoa::editarPessoa();
    header('Location: ../view/painel.php');
}

?>

