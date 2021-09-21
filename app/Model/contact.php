<?php
  
$name = $_POST['name'];
$address = $_POST['address'];
$tel1 = $_POST['tel1'];
$tel2 = $_POST['tel2'];
$email = $_POST['email'];
$message = $_POST['message'];


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
        <h1>ARQUIVO VIVO MÓVEIS - CONTATO - WEBSITE</h1>
        <p><strong>$name</strong></p>
        <p>
            $message
        </p>
        <p><strong>CONTATO:</strong> $tel1, $tel2</p>
        <p><strong>E-MAIL:</strong>$email</p>
        <p><strong>ENDEREÇO:</strong>$address</p>
        
    </body>
    </html>
    ";

    $sendMailTo = "guilhermeteste5932.ms@gmail.com";
    $destiny = $sendMailTo;
    $subject = "Contato pelo Site";

    $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From:' . $name . '<$email>';

    $enviaremail = mail($destiny, $subject, $archive, $headers);
    if($enviaremail){
    $mgm = "E-MAIL ENVIADO COM SUCESSO! <br> O link será enviado para o e-mail fornecido no formulário";
    echo " <meta http-equiv='refresh' content='10;URL=contact.php'>";
    } else {
    $mgm = "ERRO AO ENVIAR E-MAIL!";
    echo "";
    }






  


