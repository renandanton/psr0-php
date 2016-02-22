<?php

/**
 * Created by PhpStorm.
 * User: Renan
 * Date: 21/02/2016
 * Time: 15:05
 */
class Conteiner
{

    public static function getConexao()
    {
        $conexao = new Conexao();
        return $conexao;
    }

    public static  function getClientes()
    {
        $clientes = new Clientes(self::getConexao());
        return $clientes;
    }

    public static  function getContratos()
    {

    }
}