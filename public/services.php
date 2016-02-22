<?php

$container['conexao'] = function(\Pimple\Container $container){
    return new \SON\Conexao($container['host'], $container['db'], $container['user'], $container['password']);
};

$container['clientes'] =  function(\Pimple\Container $container){
    return  new \SON\Clientes($container['conexao']);
};

$container['contratos'] =  function(\Pimple\Container $container){
    return  new \SON\Contratos($container['conexao']);
};