<?php
//Carregamento das classes
require __DIR__.'../../../vendor/autoload.php';

use \App\Controller\Entity\Movel;
use \App\Controller\Entity\Curtido;

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

$readonly = 'readonly';
$btnUpdate = '';
$resultMoveis = '';
$sorry = '';

if(isset($_GET['update'])){
    switch ($_GET['update']) {
        case 'true':
            $readonly = '';
            $btnUpdate = '<button type="submit" class="btn-update">ATUALIZAR</button>';
            break;
    }
}

$furnitures = Curtido::getCurtidos($id);

foreach ($furnitures as $furniture){
    $resultMoveis .= '
        <fieldset>
                <article onclick="window.location.href = `viewMoveis.php?id='.$furniture->m_id.'`">
                    <div class="sample-furniture">
                        <div style="background-image: url(data:'.$furniture->m_typeImg.';base64,'.base64_encode($furniture->m_imagem).');"></div>
                        <p><strong>'.$furniture->m_titulo.'</strong></p>
                        <h3>'.$furniture->ct_nome.'</h3>
                    </div>
                </article>
            </fieldset>
        ';
}


if (strlen($resultMoveis) == 0){
    $sorry = '            
    <p class="sorry">
    Parece que você não curtiu nenhum movel <a href="furnitures.php">Clique aqui</a> e
    confira nosso portifólio
    </p>';
}




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="../../public/css/perfil.css" />
    <link rel="stylesheet" type="text/css" href="../../public/css/header.css" />
    <link rel="stylesheet" type="text/css" href="../../public/css/furnitures-container.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/footer.css" />
    <link rel="stylesheet" type="text/css" href="../../public/css/scroll.css">


    <link rel="preconnect" href="https://fonts.googleapis.com/%22%3E" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;0,800;1,100&display=swap"
        rel="stylesheet" />
    <title>Perfil</title>
</head>

<body>
    <div id="container">
    <?php include 'includes/header.php' ?>
        <main>
            <div class="perfil-title">
                <h1>SEU PERFIL</h1>
                <span>
                    <a href="?update=true"><img src="../../public/images/edit.svg" alt="Editar"></a>
                    <a href="../Model/End-Session.php"><img src="../../public/images/exit.svg" alt="Sair"></a>
                </span>
            </div>
            <hr />
            <form action="../Model/Update.php" method="post">
                <div class="input-box">
                    <div class="input-single">
                        <p>nome:</p>
                        <input type="text" name="name" value="<?=$name?>" <?=$readonly?>/>
                    </div>
                    <div class="input-single">
                        <p>sobre.:</p>
                        <input type="text" name="lastName" value="<?=$lastName?>" <?=$readonly?>/>
                    </div>
                </div>
                <div class="input-box">
                    <div class="input-single">
                        <p>email:</p>
                        <input type="text" name="email" value="<?=$email?>" <?=$readonly?>/>
                    </div>
                    <div class="input-single">
                        <p>senha.:</p>
                        <input type="password" name="pass" value="<?=$pass?>" <?=$readonly?>/>
                    </div>
                </div>
                <div class="input-box">
                    <div class="input-single">
                        <p>tel fixo:</p>
                        <input type="text" name="telFix" value="<?=$telFix?>" <?=$readonly?>/>
                    </div>
                    <div class="input-single">
                        <p>tel cel:</p>
                        <input type="text" name="telCel" value="<?=$telCel?>" <?=$readonly?>/>
                    </div>
                </div>
                <div class="input-box">
                    <div class="input-single">
                        <p>rua:</p>
                        <input type="text" name="street" value="<?=$street?>" <?=$readonly?>/>
                    </div>
                    <div class="input-single">
                        <p>bairro:</p>
                        <input type="text" name="district" value="<?=$district?>" <?=$readonly?>/>
                    </div>
                </div>
                <div class="input-box">
                    <div class="input-cep-num">
                        <div>
                            <p>cep:</p>
                            <input type="text" name="cep" value="<?=$cep?>" <?=$readonly?>/>
                        </div>
                        <div>
                            <p>n°:</p>
                            <input type="text" name="numRes" class="n" value="<?=$numRes?>" <?=$readonly?>/>
                        </div>
                    </div>
                    <div class="input-single">
                        <p>complemento:</p>
                        <input type="text" name="complement" value="<?=$complement?>" <?=$readonly?>/>
                    </div>
                </div>
                <?=$btnUpdate?>
            </form>
            <br />
            <br />
        </main>
        <section>
            <h1>CURTIDOS &#10084;</h1>
            <hr />
            <?=$sorry?>
            <div class="furnitures-container">
                <div>
                <?=$resultMoveis?>
                </div>
            </div>
        </section>
        <?php include 'includes/footer.php'?>
    </div>
</body>

</html>