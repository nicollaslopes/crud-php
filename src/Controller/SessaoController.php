<?php

require_once '../../vendor/autoload.php';

use MyApp\Utils\Sessao;

Sessao::excluirSessao();

header("Location: ../index.php");