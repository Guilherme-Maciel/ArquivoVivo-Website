<?php


namespace App\Controller\Entity;

use PDO;
use \App\Lib\Db\Database;

class Movel{
    public $m_id;
    public $m_titulo;
    public $m_desc;
    public $m_designers;
    public $m_assoc;
    public $m_qtdEstoque;
    public $m_categoria;
    public $m_imagem;
    public $m_typeImg;
    public $d_id;
    public $ct_id;
    public $ct_nome;

    public static function getMoveis($where = null, $order = null, $limit = null){
        return (new Database('moveis, categoria'))->select($where,$order,$limit)
        ->fetchAll(PDO::FETCH_CLASS,self::class);
    }
    public static function getMovel($id){
        return (new Database('moveis, categoria'))->select('m_id = '.$id.' and moveis.ct_id = categoria.ct_id')
        ->fetchObject(self::class);
    }
    public static function getMovelByDesigner($id){
        return (new Database('moveis, categoria'))->select('d_id = '.$id.' and moveis.ct_id = categoria.ct_id')
        ->fetchObject(self::class);
    }


}