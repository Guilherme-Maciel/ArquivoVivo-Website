<?php
/**
 * Arquivo responsável pela função de deslike da aplicação.
 * 
 * Necessário haver uma sessão ativa
 * 
 * Exclui o atributo do banco de dados */ 

//Carregamento das classes
require __DIR__.'../../../vendor/autoload.php';

use App\Controller\Entity\Curtido;

if(!isset($_SESSION)){
    session_start();

    $id = $_SESSION['id_session'];
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

$obCurtido = new Curtido;

$getCurtido = $obCurtido->getCurtido($_GET['id'], $id);

if($getCurtido->rowCount() == 1){
    $getLikeId = $getCurtido->fetch();
    $obCurtido->l_id = $getLikeId['l_id'];
    $obCurtido->excluir();
    header("location: ../View/viewMoveis.php?id=$_GET[id]");
}
else{
    header("location: location: ../View/furnitures.php");
}

