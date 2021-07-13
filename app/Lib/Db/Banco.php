<?php

namespace Lib\Db;

class Banco
{
    private $dsn = 'mysql:host=localhost;dbname=blog';

    private $user = 'developer';

    private $pass = '4linux';

    public function conectar()
    {
        $pdo = new \PDO($this->dsn, $this->user, $this->pass);
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}