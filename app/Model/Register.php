<?php

require __DIR__.'../../../vendor/autoload.php';

use \App\Controller\Entity\Cliente;

if(isset($_POST['name'], $_POST['lastName'], $_POST['email'], $_POST['password'], $_POST['confirmPassword'])){

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
        $obCliente->register();

        header('location: ../View/index.php?message=cadastro_sucesso');
        exit;
}
else{
    header('location: ../View/index.php?message=cadastro_erro');
    exit;
}
}

?>