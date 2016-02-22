<?php

require_once '../vendor/autoload.php';
require_once 'config.php';
require_once 'services.php';

$serviceContratos = $container['contratos'];

$updateContrato = $serviceContratos->update($_GET['id'], $_POST);

header("location: contratos.index.php?updated ");
