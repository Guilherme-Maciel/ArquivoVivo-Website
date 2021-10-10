<?php
    require __DIR__.'../../../vendor/autoload.php';
    use \App\Controller\Entity\Movel;

    if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
        header('location: furnitures.php?status=error');
        exit;
    }

    $results = '';
    $dispo = '';
    $furniture = Movel::getMovel($_GET['id']);
    

    if($furniture->m_qtdEstoque <= 0){
        $dispo = '<span class="indis">INDISPONÍVEL</span>';
    }else{
        $dispo = '<span class="dis">DISPONÍVEL</span>';

    }

        $results = '
        <div id="all">
            <div class="image-furniture">
                <img src="data:'.$furniture->m_typeImg.';base64,'.base64_encode($furniture->m_imagem).'"">
                <p>'.$dispo.' '.$furniture->m_qtdEstoque.' em estoque</p>
                <p class="heart"><img src="../../public/images/heart.svg" alt="coração"></p>
            </div>
            <div class="furniture-informations">
                <h1>'.utf8_encode($furniture->m_titulo).'</h1>
                <br><br><br>
                <p class="title">INFORMAÇÕES:</p><br>
                <p>
                   '.utf8_encode($furniture->m_desc).'
                </p><br><br><br>
                <p>DESIGNERS: <a href="viewDesigners.php?id='.$furniture->d_id.'">'.utf8_encode($furniture->m_designers).'</a></p><br>
                <p>CATEGORIAS: <a href="#">'.utf8_encode($furniture->m_categoria).'</a></p><br><br><br>
                <ul>
                    <li>Cadeira Saarinem Base fixa</li>
                    <li>Cadeira Saarinem Base fixa</li>
                    <li>Cadeira Saarinem Base fixa</li>
                    <li>Cadeira Saarinem Base fixa</li>
                </ul><br><br><br>
                <p class="title">FAÇA NEGÓCIO:</p><br><br>
                <div class="buttons">
                    <button class="whatsapp">WhatsApp <img src="../../public/images/whatsapp.svg"
                            alt="whatsapp"></button>
                    <button class="gmail">Gmail <img src="../../public/images/gmail.svg" alt="gmail"></button>
                </div>
            </div>
        </div> 
        ';

?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=strtoupper(utf8_encode($furniture->m_titulo))?></title>
    <link href="" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../../public/css/view-moveis.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/header.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/footer.css">
    <link rel="preconnect" href="https://fonts.googleapis.com/%22%3E">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;0,800;1,100&display=swap"
        rel="stylesheet">
</head>

<body>
    <div id="container">
    <?php include 'includes/header.php'?>
        <button id="back" onClick="history.go(-1)"><img src="../../public/images/arrow.svg" alt="arrow"></button>
        <hr>
        <?=$results?>
        <hr>
        <?php include 'includes/footer.php'?>
    </div>
</body>
</html>