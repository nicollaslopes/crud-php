<?php

namespace MyApp\Service\Interface;

interface PessoaInterface
{
    public static function editarPessoa(array $arrayDadosPessoa): void;
    public static function excluirPessoa($idPessoa): void;
}