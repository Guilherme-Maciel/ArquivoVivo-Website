<?php


namespace App\Model;

class Contact{

    private $name;
    private $address;
    private $tel1;
    private $tel2;
    private $email;
    private $message;

    public function __construct($name, $address, $tel1, $tel2, $email, $message)
    {
        $this->name = $name;
        $this->address = $address;
        $this->tel1 = $tel1;
        $this->tel2 = $tel2;
        $this->email = $email;
        $this->message = $message;
    }

    public function sendMail(){
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
                    <h1>ARQUIVO VIVO MÓVEIS - CONTATO - WEBSITE</h1>
                    <p><strong>{$this->name}</strong></p>
                    <p>
                        {$this->message}
                    </p>
                    <p><strong>CONTATO: </strong> {$this->tel1}, {$this->tel2}</p>
                    <p><strong>E-MAIL: </strong>{$this->email}</p>
                    <p><strong>ENDEREÇO: </strong>{$this->address}</p>
                    
                </body>
                </html>
                ";

    //Variáveis de envio
    $destiny = "guilhermeteste5932.ms@gmail.com";
    $subject = "Contato pelo Site";
    $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From:' . $this->name . '<'.$this->email.'>';

    //Função enivar
    $sendMail = mail($destiny, $subject, $archive, $headers);
    if($sendMail){
        header('location: ../View/contato.php?status=success');
        return true;

    } else {
        header('location: ../View/contato.php?status=error');
        return false;
    }

    }
}

$contact = new Contact($_POST['name'],$_POST['address'],$_POST['tel1'],$_POST['tel2'],$_POST['email'],$_POST['message']);
echo $contact->sendMail();

   






  


