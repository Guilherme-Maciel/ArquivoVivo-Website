<?php

namespace App\Controller\Entity;

use PDO;
use \App\Lib\Db\Database;

class Cliente{
    private $id;
    private $name;
    private $lastName;
    private $tel1;
    private $tel2;
    private $email;
    private $password;
    private $city;
    private $state;
    private $street;
    private $district;
    private $resNum;
    private $cep;
    private $comple;
    private $situacion;
    private $date;

    public function __construct(
        $name, 
        $lastName, 
        $tel1, 
        $tel2, 
        $email, 
        $password, 
        $city, $state, 
        $street, 
        $district, 
        $resNum, 
        $cep, 
        $comple)
    {
        $this->name = $name;
        $this->lastName = $lastName;
        $this->tel1 = $tel1;
        $this->tel2 = $tel2;
        $this->email = $email;
        $this->password = $password;
        $this->city = $city;
        $this->state = $state;
        $this->street = $street;
        $this->district = $district;
        $this->resNum = $resNum;
        $this->cep = $cep;
        $this->comple = $comple;
    }

    public function register(){

        $this->date = date('Y-m-d H:i:s');
        $this->situacion = 'ativo';

        $obDatabase = new Database('cliente');
        $this->id = $obDatabase->insert([
            'c_nome' => $this->name,
            'c_sobrenome' => $this->lastName,
            'c_telCel' => $this->tel1,
            'c_telFixo' => $this->tel2,
            'c_email' => $this->email,
            'c_senha' => $this->password,
            'c_cidade' => $this->city,
            'c_estado' => $this->state,
            'c_rua' => $this->street,
            'c_bairro' => $this->district,
            'c_numRes' => $this->resNum,
            'c_cep' => $this->cep,
            'c_complemento' => $this->comple,
            'c_dtReg' => $this->date,
            'c_state' => $this->situacion
        ]);

    }








}