<?php
require_once '../vendor/autoload.php';
require_once 'config.php';
require_once 'services.php';

$serviceContratos = $container['contratos'];

$deleteContratos = $serviceContratos->delete($_GET['id']);

header("location: contratos.index.php?deleted ");