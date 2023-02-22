<?php

require_once '../../vendor/autoload.php';

use MyApp\Model\Db;

class Pessoa {

    public static function cadastrarPessoa(): void {

        $nomePessoa = $_POST['nomePessoa'];
        $dtNascimentoPessoa = $_POST['dtNascimentoPessoa'];
        $cpfPessoa = $_POST['cpfPessoa'];
        $rgPessoa = $_POST['rgPessoa'];
        $enderecoPessoa = $_POST['enderecoPessoa'];
        $cepPessoa = $_POST['cepPessoa'];
        $numeroPessoa = $_POST['numeroPessoa'];
        $telefonePessoa = $_POST['telefonePessoa'];
        $ufPessoa = $_POST['ufPessoa'];
        $dataMomento = date("Y/m/d");

        $pdo = Db::conecta();

        $stmt = $pdo->prepare("INSERT INTO estados (uf) 
                                VALUES (:uf)");

        $stmt->bindParam(':uf', $ufPessoa);
        
        $stmt->execute();
        $ultimoIdInserido = $pdo->lastInsertId();


        $stmt = $pdo->prepare("INSERT INTO enderecos (estado_id, cep, endereco, numero) 
                                VALUES (:estado_id, :cep, :endereco, :numero)");

        $stmt->bindParam(':estado_id', $ultimoIdInserido);
        $stmt->bindParam(':cep', $cepPessoa);
        $stmt->bindParam(':endereco', $enderecoPessoa);
        $stmt->bindParam(':numero', $numeroPessoa);

        $stmt->execute();
        $ultimoIdInserido = $pdo->lastInsertId();

        $stmt = $pdo->prepare("INSERT INTO pessoas (endereco_id, nome, cpf, rg, data_nascimento, data_cadastro) 
                                VALUES (:endereco_id, :nome, :cpf, :rg, :data_nascimento, :data_cadastro)");

        $stmt->bindParam(':endereco_id', $ultimoIdInserido);
        $stmt->bindParam(':nome', $nomePessoa);
        $stmt->bindParam(':cpf', $cpfPessoa);
        $stmt->bindParam(':rg', $rgPessoa);
        $stmt->bindParam(':data_nascimento', $dtNascimentoPessoa);
        $stmt->bindParam(':data_cadastro', $dataMomento);

        $stmt->execute();
        $ultimoIdInserido = $pdo->lastInsertId();


        $stmt = $pdo->prepare("INSERT INTO telefones (pessoa_id, telefone) 
                                VALUES (:pessoa_id, :telefone)");

        $stmt->bindParam(':pessoa_id', $ultimoIdInserido);
        $stmt->bindParam(':telefone', $telefonePessoa);

        $stmt->execute();

    }

    public static function listarPessoa(): array {
        
        $pdo = Db::conecta();

        $stmt = $pdo->prepare("SELECT
                                    p.id,
                                    p.nome, 
                                    p.cpf, 
                                    p.rg, 
                                    e.cep, 
                                    tel.telefone,
                                    p.data_nascimento
                                FROM 
                                    pessoas p,
                                    enderecos e,
                                    estados es,
                                    telefones tel
                                WHERE 
                                    p.endereco_id = e.id
                                AND
                                    e.estado_id = es.id
                                AND
                                    tel.pessoa_id = p.id");

        $stmt->execute();

        $dadosPessoa = $stmt->fetchAll();

        return $dadosPessoa;
    }

}

if (isset($_POST['cadastrarPessoa'])) {
    Pessoa::cadastrarPessoa();
    header('Location: ../view/painel.php');
}

?>

