<?php

require_once '../vendor/autoload.php';
require_once 'config.php';
require_once 'services.php';

$serviceContratos = $container['contratos'];

$intsertContrato = $serviceContratos->create($_POST);

header("location: contratos.index.php?saved ");