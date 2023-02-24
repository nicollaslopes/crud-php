<?php

namespace MyApp\Services\Interfaces;

interface PessoaInterface
{
    public static function cadastrarPessoa(array $arrayDadosPessoa): void;
    public static function editarPessoa(array $arrayDadosPessoa): void;
    public static function excluirPessoa($idPessoa): void;
    public static function listarPessoa(): array;
}