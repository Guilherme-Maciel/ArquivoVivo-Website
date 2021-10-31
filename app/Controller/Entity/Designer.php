<?php


namespace App\Controller\Entity;

use PDO;
use \App\Lib\Db\Database;

class Designer{
    public $ct_id;
    public $ct_nome;
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

    public static function getQtdDesigners($where = null){
        return (new Database('designers'))->select($where, null, null, 'COUNT(*) as qtd')
        ->fetchObject()->qtd;
    }

    public static function getDesignerByCategoria($id){
        return (new Database('designers, moveis, categoria'))->select('designers.d_id = '.$id.' and designers.d_id = moveis.d_id and moveis.ct_id = categoria.ct_id GROUP BY categoria.ct_id, categoria.ct_nome', null, null, 'categoria.ct_id, categoria.ct_nome')
        ->fetchAll(PDO::FETCH_CLASS,self::class);
    }

}