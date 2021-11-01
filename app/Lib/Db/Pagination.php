<?php
/**
 * Classe responsável por retornar o limite de consultas por página
 * 
 * __construct() -> atribui a quantidade de consultas, a página atual e o limite total - $results, $currentPage, $limit.
 * calculate() -> método responsável por calcular o total de páginas de acordo com o $results
 * getLimit() -> retorna os parametrôs para o "LIMIT início, final" 
 * getPages() -> listagem do número total de páginas
 */

namespace App\Lib\Db;

class Pagination{
    //max number of registers
    private $limit;

    //resultados do banco
    private $results;

    //qtd pages
    private $pages;

    //page atual
    private $currentPage;

    public function __construct($results,$currentPage = 1,$limit = 20)
    {
        $this->results = $results;
        $this->limit = $limit;
        $this->currentPage = (is_numeric($currentPage) and $currentPage > 0) ? $currentPage : 1;
        $this->calculate();
    }

    //calcula a páginação
    private function calculate(){
        //Calcula o total de páginas
        $this->pages = $this->results > 0 ? ceil($this->results / $this->limit) : 1;

        //verifica se a pag atual não excede num de páginas
        $this->currentPage = $this->currentPage <= $this->pages ? $this->currentPage : $this->pages;

    }

    //retorna o limit
    public function getLimit(){
        $offset = ($this->limit * ($this->currentPage - 1)); 
        return $offset.','.$this->limit;
    }

    //Responsável pelo retorno de opções de páginas
    public function getPages(){
        //NO return
        if($this->pages == 1) return[];

        //páginas
        $paginas = [];
        for($i = 1; $i <= $this->pages; $i++){
            $paginas[] = [
                'pagina' => $i,
                'atual' => $i == $this->currentPage
            ];
        }

        return $paginas;
    }
}