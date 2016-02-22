<?php
require_once '../vendor/autoload.php';
require_once 'config.php';
require_once 'services.php';

$serviceClientes = $container['clientes'];

$deleteCliente = $serviceClientes->delete($_GET['id']);

header("location: ".$_SERVER['HTTP_HOST']."?deleted ");