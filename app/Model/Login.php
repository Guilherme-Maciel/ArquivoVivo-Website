<?php
/**
 * Arquivo responsável pelo login e sessão dos usuários
 */

//Carregamento das classes
session_start();
require __DIR__.'../../../vendor/autoload.php';

use App\Controller\Entity\Cliente;


$getLogin = Cliente::getLoginUser($_POST['email'], $_POST['password']);

if($getLogin->rowCount() == 1){
    $login = $getLogin->fetch();

    $_SESSION['login_session'] = $login['c_email'];
    $_SESSION['pass_session'] = $login['c_senha'];
    $_SESSION['userName_session'] = $login['c_nome'];
    $_SESSION['userLast_session'] = $login['c_sobrenome'];
    $_SESSION['telFix_session'] = $login['c_telFixo'];
    $_SESSION['telCel_session'] = $login['c_telCel'];
    $_SESSION['street_session'] = $login['c_rua'];
    $_SESSION['district_session'] = $login['c_bairro'];
    $_SESSION['cep_session'] = $login['c_cep'];
    $_SESSION['numRes_session'] = $login['c_numRes'];
    $_SESSION['complement_session'] = $login['c_complemento'];

    header("location: ../View/perfil.php");

}
else{
    session_destroy();
    header("location: ../View/index.php?status=error-login#errorLoginModal");
    
}
