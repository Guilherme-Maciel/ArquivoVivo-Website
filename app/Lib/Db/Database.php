<?php

namespace App\Lib\Db;

use PDO;
use PDOException;

class Database{
 
    public function insert($values){
    $sql = new PDO('mysql:host=localhost;dbname=arquivovivomv', 'root', '');
    $sql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $fields = array_keys($values);

    echo "INSERT INTO clientes (".implode(',',$fields).") VALUES(".implode(',', $values).")";

/*
try {
        $sql->beginTransaction();
        $sql->exec("INSERT INTO clientes (".implode(',',$fields).") VALUES(".implode(',', $values).")");
        //$sql->commit();
        echo"dados salvos cachorro"; 
    } catch (PDOException $error) {
        $sql->rollBack();
        
    }
*/ 




    }


}