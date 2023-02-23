<?php

namespace MyApp\Service;

require_once '../../vendor/autoload.php';

use MyApp\Model\Db;
use MyApp\Service\Interface\EditarPessoaInterface;

class EditarPessoaService implements EditarPessoaInterface
{
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
}