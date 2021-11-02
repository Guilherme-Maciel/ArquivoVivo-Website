<?php

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
    header("location: ../View/viewMoveis.php?id=$_GET[id]#errorLike");
    exit;
}

$obCurtido = new Curtido;

$obCurtido->c_id = $id;
$obCurtido->m_id = $_GET['id'];
 //método responsável pelo registro dos dados
$obCurtido->register();
header("location: ../View/viewMoveis.php?id=$_GET[id]");
exit;
