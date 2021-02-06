<?php

require_once "vendor/autoload.php";

use \Karoline\BibliotecaCep\Busca;

$busca = new Busca();

$resultado = $busca->getEnderecoPeloCep('77015476');

print_r($resultado);