<?php
/**
 * Arquivo responsável pelo registro de usuários
 */

//Carregamento das classes
require __DIR__.'../../../vendor/autoload.php';

use \App\Controller\Entity\Cliente;

$obCliente = new Cliente;

//Realiza a validação dos dados do formulário
if(isset($_POST['name'], $_POST['lastName'], $_POST['email'], $_POST['password'], $_POST['confirmPassword'])){
    //validação da senha e atribuição dos valores ao construct
    if($_POST['password'] == $_POST['confirmPassword']){

        $obCliente->c_nome = $_POST['name'];
        $obCliente->c_sobrenome = $_POST['lastName'];
        $obCliente->c_email = $_POST['email'];
        $obCliente->c_senha = $_POST['password'];
         //método responsável pelo registro dos dados
        $obCliente->register();
        header('location: ../View/index.php#confirmCadasterModal');
        exit;
    }
    else{
        header('location: ../View/index.php?status=senha-errada#errorCadasterModal');
        exit;
    }
}

?>