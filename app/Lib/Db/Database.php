<?php
/**
 * Classe responsável pelo controle de querys para o banco de dados Mysql
 * 
 * __construct() -> recebe a ou as tabelas a serem empregadas e configura a conexão com o banco pelo método setConnection()
 * setConnection() -> método responsável pela conexão com o banco de dados
 * execute() -> método responsável pela execução das querys
 * 
 * insert() -> método responsável pela inserção de dados no banco
 * select() -> método responsável pela consulta de dados no banco
 */

namespace App\Lib\Db;

use PDO;
use PDOException;

class Database{
    //Variáveis para conexão ao banco de dados
    const HOST = 'localhost';
    const NAME = 'arquivovivomv';
    const USER = 'root';
    const PASS = '';

    private $table;
    private $connection;

    public function __construct($table)
    {
        $this->table = $table;
        $this->setConnection();
    }

    private function setConnection(){
        try{
            $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME,self::USER,self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        }catch(PDOException $e){
            die('ERROR:'.$e->getMessage());
        }
    }

    public function execute($query,$params = []){
        try{
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;
        }catch(PDOException $e){
            die('ERROR:'.$e->getMessage());

        }
    }
 
    public function insert($values){
        //Remove dados vazios no array
        $values = array_filter($values);
        //atribui somente as keys do array $values à variável $fields
        $fields = array_keys($values);
        //Array recebe "?" para cada campo em $fields
        $binds = array_pad([],count($fields),'?');

        //elaboração da query INSERT
        $query = "INSERT INTO ".$this->table." (".implode(',',$fields).") VALUES(".implode(',', $binds).")";
        //Substituição dos binds "?" pelos valores do array $values e execução da query
        $this->execute($query,array_values($values));
        //Retorna o id cadastrado
        return $this->connection->lastInsertId();

    }

     public function select($where = null, $order = null, $limit = null, $fields = '*'){
        //parâmetros de consulta Mysql
        $where = strlen($where) ? 'WHERE '.$where : '';
        $order = strlen($order) ? 'ORDER BY '.$order : '';
        $limit = strlen($limit) ? 'LIMIT '.$limit : '';

        //query
        $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;

        //execução da query
        return $this->execute($query);

    }

}