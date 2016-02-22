<?php

require_once '../vendor/autoload.php';
require_once 'config.php';
require_once 'services.php';

$serviceClientes = $container['clientes'];

$intertCliente = $serviceClientes->create($_POST);

header("location: ".$_SERVER['HTTP_HOST']."?saved ");