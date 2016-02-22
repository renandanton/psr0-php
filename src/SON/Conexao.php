<?php

namespace SON;


class Conexao implements ConexaoInterface
{
    private $host;
    private $user;
    private $password;
    private $database;

    public function __construct($host, $db, $user, $password)
    {
        $this->host =  $host;
        $this->database = $db;
        $this->user = $user;
        $this->password = $password;
    }

    public function getConnection()
    {
       return new \PDO("mysql:host={$this->host};dbname={$this->database};charset=utf8", $this->user, $this->password, [
           \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
       ]);
    }




}