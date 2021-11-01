<?php

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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="../../public/css/perfil.css" />
    <link rel="stylesheet" type="text/css" href="../../public/css/header.css" />
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
                    <img src="../../public/images/edit.svg" alt="Editar">
                    <a href="../Model/End-Session.php"><img src="../../public/images/exit.svg" alt="Sair"></a>
                </span>
            </div>
            <hr />
            <form action="">
                <div class="input-box">
                    <div class="input-single">
                        <p>nome:</p>
                        <input type="text" value="<?=$name?>"/>
                    </div>
                    <div class="input-single">
                        <p>sobre.:</p>
                        <input type="text"  value="<?=$lastName?>"/>
                    </div>
                </div>
                <div class="input-box">
                    <div class="input-single">
                        <p>email:</p>
                        <input type="text"  value="<?=$email?>"/>
                    </div>
                    <div class="input-single">
                        <p>senha.:</p>
                        <input type="password" value="<?=$pass?>"/>
                    </div>
                </div>
                <div class="input-box">
                    <div class="input-single">
                        <p>tel fixo:</p>
                        <input type="text" value="<?=$telFix?>"/>
                    </div>
                    <div class="input-single">
                        <p>tel cel:</p>
                        <input type="text"  value="<?=$telCel?>"/>
                    </div>
                </div>
                <div class="input-box">
                    <div class="input-single">
                        <p>rua:</p>
                        <input type="text"  value="<?=$street?>"/>
                    </div>
                    <div class="input-single">
                        <p>bairro:</p>
                        <input type="text"  value="<?=$district?>"/>
                    </div>
                </div>
                <div class="input-box">
                    <div class="input-cep-num">
                        <div>
                            <p>cep:</p>
                            <input type="text"  value="<?=$cep?>"/>
                        </div>
                        <div>
                            <p>n°:</p>
                            <input type="text" class="n" value="<?=$numRes?>"/>
                        </div>
                    </div>
                    <div class="input-single">
                        <p>complemento:</p>
                        <input type="text" value="<?=$complement?>"/>
                    </div>
                </div>
            </form>
            <br />
            <br />
        </main>
        <section>
            <h1>CURTIDOS &#10084;</h1>
            <hr />
            <p>
                Parece que você não curtiu nenhum movel <a href="">Clque aqui</a> e
                confira nosso portifólio
            </p>
        </section>
        <?php include 'includes/footer.php'?>
    </div>
</body>

</html>