<?php
/**
 * Arquivo responsável pelo registro de usuários
 */

//Carregamento das classes
require __DIR__.'../../../vendor/autoload.php';

use \App\Controller\Entity\Cliente;

//Realiza a validação dos dados do formulário
if(isset($_POST['name'], $_POST['lastName'], $_POST['email'], $_POST['password'], $_POST['confirmPassword'])){
    //validação da senha e atribuição dos valores ao construct
    if($_POST['password'] == $_POST['confirmPassword']){
        $obCliente = new Cliente(
        $_POST['name'], 
        $_POST['lastName'], 
        null, 
        null, 
        $_POST['email'], 
        $_POST['password'], 
        null, 
        null, 
        null, 
        null, 
        null, 
        null, 
        null);
        //método responsável pelo registro dos dados
        $obCliente->register();
        
        header('location: ../View/index.php?message=cadastro_sucesso#confirmCadasterModal');
        exit;
    }
    else{
        header('location: ../View/index.php?message=cadastro_erro');
        exit;
    }
}

?>