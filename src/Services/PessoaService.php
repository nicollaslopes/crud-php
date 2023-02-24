<?php

namespace MyApp\Services;

require_once '../../vendor/autoload.php';

use MyApp\Repositories\PessoaRepository;
use MyApp\Services\Interface\PessoaInterface;

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