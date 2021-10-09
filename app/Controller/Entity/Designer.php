<?php


namespace App\Controller\Entity;

use PDO;
use \App\Lib\Db\Database;

class Designer{
    public $d_id;
    public $d_nome;
    public $d_bio;
    public $d_imagem;
    public $d_typeImg;

    public static function getDesigners($where = null, $order = null, $limit = null){
        return (new Database('designers'))->select($where,$order,$limit)
        ->fetchAll(PDO::FETCH_CLASS,self::class);
    }
    public static function getDesigner($id){
        return (new Database('designers'))->select('d_id = '.$id)
        ->fetchObject(self::class);
    }

}