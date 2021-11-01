<?php
/**
 * Classe responsável por exercer controle sobre a entidade Designer
 * 
 * getDesigners() -> listagem de dados dos Designers pelos parâmetros WHERE, ORDER e LIMIT
 * getDesigner() -> listagem única por ID da entidade Designers
 * getQtdDesigners() -> retorna o número total de dados retornados
 * getDesignerByCategoria() -> realiza a consulta das categorias encontradas em móveis registrados com certo
 * ID da entidade esigners
 * 
 */


namespace App\Controller\Entity;

use PDO;
use \App\Lib\Db\Database; //Métodos e querys Mysql

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