<?php

namespace MyApp\Service;

require_once '../../vendor/autoload.php';

use MyApp\Model\Db;
use MyApp\Service\Interface\PessoaInterface;

class PessoaService implements PessoaInterface
{
    public static function cadastrarPessoa(array $arrayDadosPessoa): void
    {

        [
            'nomePessoa' => $nomePessoa, 
            'dtNascimentoPessoa' => $dtNascimentoPessoa,
            'cpfPessoa' => $cpfPessoa, 
            'rgPessoa' => $rgPessoa, 
            'enderecoPessoa' => $enderecoPessoa,
            'cepPessoa' => $cepPessoa,
            'numeroPessoa' => $numeroPessoa,
            'telefonePessoa' => $telefonePessoa,
            'ufPessoa' => $ufPessoa,
        ] = $arrayDadosPessoa[0];

        $dataMomento = $arrayDadosPessoa[1];

        $pdo = Db::conecta();

        $stmt = $pdo->prepare("INSERT INTO estados (uf) VALUES (:uf)");

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


        $stmt = $pdo->prepare("INSERT INTO telefones (pessoa_id, telefone) VALUES (:pessoa_id, :telefone)");

        $stmt->bindParam(':pessoa_id', $ultimoIdInserido);
        $stmt->bindParam(':telefone', $telefonePessoa);

        $stmt->execute();
    }

    public static function editarPessoa(array $arrayDadosPessoa): void
    {
        
        [
            'idPessoa' => $idPessoa,
            'nomePessoa' => $nomePessoa, 
            'cpfPessoa' => $cpfPessoa, 
            'rgPessoa' => $rgPessoa, 
            'dtnascimentoPessoa' => $dtnascimentoPessoa
        ] = $arrayDadosPessoa[0];

        $dataAtualizacao = $arrayDadosPessoa[1];

        $pdo = Db::conecta();

        $stmt = $pdo->prepare("UPDATE 
                                    pessoas
                                SET
                                    nome = :nome,
                                    cpf = :cpf,
                                    rg = :rg,
                                    data_nascimento = :dtnascimento,
                                    data_atualizacao = :data_atualizacao
                                WHERE
                                    id = :id");

        $stmt->bindParam('id', $idPessoa);
        $stmt->bindParam('nome', $nomePessoa);
        $stmt->bindParam('cpf', $cpfPessoa);
        $stmt->bindParam('rg', $rgPessoa);
        $stmt->bindParam('dtnascimento', $dtnascimentoPessoa);
        $stmt->bindParam('data_atualizacao', $dataAtualizacao);

        $stmt->execute();
    }

    public static function excluirPessoa($idPessoa): void
    {
        $pdo = Db::conecta();

        $stmt = $pdo->prepare("DELETE FROM pessoas
                                WHERE id = :id");

        $stmt->bindParam('id', $idPessoa);

        $stmt->execute();
    }

    public static function listarPessoa(): array
    {
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