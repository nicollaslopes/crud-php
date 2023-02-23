<?php

namespace MyApp\Service\Interface;

interface PessoaInterface
{
    public static function cadastrarPessoa(array $arrayDadosPessoa): void;
    public static function editarPessoa(array $arrayDadosPessoa): void;
    public static function excluirPessoa($idPessoa): void;
}