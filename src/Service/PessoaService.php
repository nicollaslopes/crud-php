<?php

namespace MyApp\Service;

require_once '../../vendor/autoload.php';

use MyApp\Model\Db;
use MyApp\Repositories\PessoaRepository;
use MyApp\Service\Interface\PessoaInterface;

class PessoaService implements PessoaInterface
{
    public static function cadastrarPessoa(array $arrayDadosPessoa): void
    {
        PessoaRepository::addPessoa($arrayDadosPessoa);
    }

    public static function editarPessoa(array $arrayDadosPessoa): void
    {
        PessoaRepository::editPessoa($arrayDadosPessoa);
    }

    public static function excluirPessoa($idPessoa): void
    {
        PessoaRepository::deletePessoa($idPessoa);
    }

    public static function listarPessoa(): array
    {
        return PessoaRepository::listPessoa();
    }
}