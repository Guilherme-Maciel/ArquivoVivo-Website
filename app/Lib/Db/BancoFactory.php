<?php

namespace Lib\Db;

class BancoFactory
{
    private static $db;

    public static function criar()
    {
        if(! self::$db){
            $db = new Banco();
            self::$db = $db->conectar();
        }

        return self::$db;
    }
}