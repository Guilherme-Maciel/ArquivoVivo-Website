<?php

$name = $_POST['name'];
$address = $_POST['address'];
$tel1 = $_POST['tel1'];
$tel2 = $_POST['tel2'];
$email = $_POST['email'];
$message = $_POST['message'];

// Compo E-mail
$archive = "
<style type='text/css'>
body {
margin:0px;
font-family:Verdane;
font-size:12px;
color: #666666;
}
a{
color: #666666;
text-decoration: none;
}
a:hover {
color: #FF0000;
text-decoration: none;
}
</style>
  <html>
      <table width='510' border='1' cellpadding='1' cellspacing='1' bgcolor='#CCCCCC'>
          <tr>
            <td>
<tr>
               <td width='500'>Nome:$nome</td>
              </tr>
              <tr>
               <td width='500'>E-mail:<b>$email<b></td>
              </tr>
              <tr>
                <td width='320'>Mensagem:<b>$message</b></td>
   </tr>
    <tr>
                <td width='320'>Telefone(s):<b>$te1, $tel2</b></td>
              </tr>
   <tr>
                <td width='500'>Endereço:$address</td>
              </tr>

          </td>
      </table>
  </html>
";

//enviar

  // emails para quem será enviado o formulário
  $sendMailTo = "guilherme5932.ms@gamil.com";
  $destiny = $emailenviar;
  $subject = "Contato pelo Site";

  // É necessário indicar que o formato do e-mail é html
  $headers  = 'MIME-Version: 1.0' . "\r\n";
      $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
      $headers .= 'From: $nome <$email>';
  //$headers .= "Bcc: $EmailPadrao\r\n";

  $enviaremail = mail($destiny, $subject, $archive, $headers);
  if($enviaremail){
  $mgm = "E-MAIL ENVIADO COM SUCESSO! <br> O link será enviado para o e-mail fornecido no formulário";
  echo " <meta http-equiv='refresh' content='10;URL=contact.php'>";
  } else {
  $mgm = "ERRO AO ENVIAR E-MAIL!";
  echo "";
  }
?>





?>