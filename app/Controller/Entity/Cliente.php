<?php
/**
 * Classe responsável por exercer controle sobre a entidade Cliente 
 * 
 * __construct() -> atribuição das variáveis para cadastro no banco de dados
 * register() -> cadastro das variáveis no banco de dados
 */
namespace App\Controller\Entity;

use PDO;
use \App\Lib\Db\Database;

class Cliente{
    public $id;
    public $c_nome;
    public $c_sobrenome;
    public $c_telCel = null;
    public $c_telFixo = null;
    public $c_email;
    public $c_senha;
    public $c_cidade = null;
    public $c_estado = null;
    public $c_rua = null;
    public $c_bairro = null;
    public $c_resNum = null;
    public $c_cep = null;
    public $c_complemento = null;
    public $c_state = null;
    public $c_dataReg = null;

    public function register(){

        $date = date('Y-m-d H:i:s');
        $situacion = 'ativo';

        $obDatabase = new Database('cliente');
        $this->c_id = $obDatabase->insert([
            'c_nome' => $this->c_nome,
            'c_sobrenome' => $this->c_sobrenome,
            'c_telCel' => $this->c_telCel,
            'c_telFixo' => $this->c_telFixo,
            'c_email' => $this->c_email,
            'c_senha' => $this->c_senha,
            'c_cidade' => $this->c_cidade,
            'c_estado' => $this->c_estado,
            'c_rua' => $this->c_rua,
            'c_bairro' => $this->c_bairro,
            'c_numRes' => $this->c_numRes,
            'c_cep' => $this->c_cep,
            'c_complemento' => $this->c_complemento,
            'c_dtReg' => $date,
            'c_state' => $situacion
        ]);

        return true;

    }

    public function updateCliente(){
        return (new Database('cliente'))->update('c_email = "'.$this->c_email.'"',[
        'c_nome' => $this->c_nome,
        'c_sobrenome' => $this->c_sobrenome,
        'c_email' => $this->c_email,
        'c_senha' => $this->c_senha,
        'c_telFixo' => $this->c_telFixo,
        'c_telCel' => $this->c_telCel,
        'c_rua' => $this->c_rua,
        'c_bairro' => $this->c_bairro,
        'c_cep' => $this->c_cep,
        'c_numRes' => $this->c_resNum,
        'c_complemento' => $this->c_complemento,
        ]);

    }

    public static function getLoginUser($email, $password){
        return (new Database('cliente'))->select('c_email = "'.$email.'" and c_senha = "'.$password.'"');
    }

}