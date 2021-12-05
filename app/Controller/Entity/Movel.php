<?php
/**
 * Classe responsável por exercer controle sobre a entidade Moveis
 * 
 * getMoveis() -> listagem de dados dos Moveis pelos parâmetros WHERE, ORDER e LIMIT
 * getMovel() -> listagem única por ID da entidade Moveis
 * getQtdMoveis() -> retorna o número total de dados obtidos
 * getMovelByDesigner() -> retorna os dados de móveis pertencentes a certo Designer pelo parâmetro ID
 * getQtdMovelByDesigner() -> retorna a quantidade de móveis pertencentes a certo Designer pelo parâmetro ID
 * 
 */

namespace App\Controller\Entity;

use PDO;
use \App\Lib\Db\Database;

class Movel{
    //Variáveis de atribuição dos valores retornados do banco
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

    public static function getAmostra($where = null, $order = null, $limit = null, $offset = null){
        return (new Database('moveis, categoria'))->selectAmostra($where,$order,$limit,$offset)
        ->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    public static function getQtdMoveis($where = null){
        return (new Database('moveis, categoria'))->select($where, null, null, 'COUNT(*) as qtd')
        ->fetchObject()->qtd;
    }

    public static function getMovel($id){
        return (new Database('moveis, categoria'))->select('m_id = '.$id.' and moveis.ct_id = categoria.ct_id')
        ->fetchObject(self::class);
    }
    public static function getMovelByDesigner($id){
        return (new Database('moveis, categoria'))->select('d_id = '.$id.' and moveis.ct_id = categoria.ct_id')
        ->fetchObject(self::class);
    }

    public static function getQtdMovelByDesigner($id){
        return (new Database('moveis, categoria'))->select('d_id = '.$id.' and moveis.ct_id = categoria.ct_id', null, null, 'COUNT(*) as qtd')
        ->fetchObject()->qtd;
    }

}