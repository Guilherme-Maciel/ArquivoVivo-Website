<?php
/**
 * Envio da senha ao e-mail do usuário, caso ele esqueça */ 

//Carregamento das classes
require __DIR__ . '../../../vendor/autoload.php';

use App\Controller\Entity\Cliente;

$email = $_POST['email'];

$getPass = Cliente::forgetPassword($email);

if ($getPass->rowCount() == 1) {
    $login = $getPass->fetch();
    $name = $login['c_nome'];
    $password = $login['c_senha'];

    //Corpo do Email
    $archive = "
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <link rel='preconnect' href='https://fonts.googleapis.com/%22%3E' />
            <link rel='preconnect' href='https://fonts.gstatic.com/' crossorigin />
            <link
                href='https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;0,800;1,100&display=swap'
                rel='stylesheet' />
                <style>
                    body{
                        font-family: Raleway;
                    }
                </style>
            <title>Email</title>
        </head>
        <body>
            <h1>ARQUIVO VIVO MÓVEIS - SUA SENHA - WEBSITE</h1>
            <p>
                A senha de sua conta Arquivo Vivo é: <strong>{$password}</strong>
            </p>  
        </body>
        </html>
    ";
    //Variáveis de envio
    $destiny = "guilhermeteste5932.ms@gmail.com";
    $subject = "Contato pelo Site";
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: Arquivo Vivo Móveis <vendas@arquivovivo.com.br>';

    //Função enivar
    $sendMail = mail($destiny, $subject, $archive, $headers);
    if ($sendMail) {
        header('location: ../View/index.php?status=email-send#emailSendModal');
    } else {
        header('location: ../View/index.php?status=email-error#emailErrorModal');
    }
} else {
    header('location: ../View/index.php?status=email-error#emailErrorModal');
}
