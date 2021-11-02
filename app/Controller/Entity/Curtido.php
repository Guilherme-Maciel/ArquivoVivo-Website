<?php
/**
 * Classe responsável por exercer controle sobre a entidade Moveis
 * 
 * getMoveis() -> listagem de dados dos Moveis pelos parâmetros WHERE, ORDER e LIMIT
 * 
 */

namespace App\Controller\Entity;

use PDO;
use \App\Lib\Db\Database;

class Curtido{
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
    public $c_id;
    public $l_id;

    public function register(){

        $obDatabase = new Database('curtidos');
        $this->l_id = $obDatabase->insert([
            'c_id' => $this->c_id,
            'm_id' => $this->m_id,
        ]);

        return true;
    }

    public static function getCurtidos($id){
        return (new Database('curtidos, moveis, categoria, cliente'))->select('moveis.ct_id = categoria.ct_id AND moveis.m_id = curtidos.m_id AND curtidos.c_id = '.$id.' GROUP BY moveis.m_id, moveis.m_typeImg, moveis.m_imagem, moveis.m_titulo, categoria.ct_nome', null, null, 'moveis.m_id, moveis.m_typeImg, moveis.m_imagem, moveis.m_titulo, categoria.ct_nome')
        ->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    public static function getCurtido($idM, $idC){
        return (new Database('curtidos'))->select('m_id = '.$idM.' and c_id = '.$idC);
    }

    public function excluir(){
        return (new Database('curtidos'))->delete('l_id = '.$this->l_id);

    }
}