<?php
/**
 * Arquivo responsável pela atualização dos dados do usuário no banco de dados
 */

//Carregamento das classes
require __DIR__.'../../../vendor/autoload.php';

use App\Controller\Entity\Cliente;

if(!isset($_SESSION)){
    session_start();

    $email = $_SESSION['login_session'];
    $pass = $_SESSION['pass_session'];
    $name = $_SESSION['userName_session'];
    $lastName = $_SESSION['userLast_session'];
    $telFix = $_SESSION['telFix_session'];
    $telCel = $_SESSION['telCel_session'];
    $street = $_SESSION['street_session'];
    $district = $_SESSION['district_session'];
    $cep = $_SESSION['cep_session'];
    $numRes = $_SESSION['numRes_session'];
    $complement = $_SESSION['complement_session'];

}

if(!isset($_SESSION['login_session']) and  !isset($_SESSION['pass_session'])){
    session_destroy();
    header("location: index.php?status=error_session#errorSessionModal");
}

$obCliente = new Cliente;

if(isset($_POST['email']) and isset($_POST['pass']) and 
isset($_POST['name']) and isset($_POST['lastName'])){
    $obCliente->c_nome = $_POST['name'];
    $obCliente->c_sobrenome = $_POST['lastName'];
    $obCliente->c_email = $_POST['email'];
    $obCliente->c_senha = $_POST['pass'];
    $obCliente->c_telFixo = $_POST['telFix'];
    $obCliente->c_telCel = $_POST['telCel'];
    $obCliente->c_rua = $_POST['street'];
    $obCliente->c_bairro = $_POST['district'];
    $obCliente->c_cep = $_POST['cep'];
    $obCliente->c_resNum = $_POST['numRes'];
    $obCliente->c_complemento = $_POST['complement'];
    $obCliente->updateCliente();

    session_destroy();
    header('location: ../View/index.php');
    exit;
}
else{
    echo "Erro";
    exit;
}
