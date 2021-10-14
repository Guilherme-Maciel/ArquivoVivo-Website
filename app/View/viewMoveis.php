<?php
    require __DIR__.'../../../vendor/autoload.php';
    use \App\Controller\Entity\Movel;

    if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
        header('location: furnitures.php?status=error');
        exit;
    }

    $results = '';
    $resultAssoc = '';
    $dispo = '';
    $designers = '';
    $categoria = '';
    $business = '';

    $furniture = Movel::getMovel($_GET['id']);
    

    if($furniture->m_qtdEstoque <= 0){
        $dispo = '<span class="indis">INDISPONÍVEL</span>';
    }else{
        $dispo = '<span class="dis">DISPONÍVEL</span>';

    }

    if($furniture->ct_id == 2){
        //Se a categoria da leitura for AMBIENTES, os IDs serão atribuidos à variável assoc
        $assoc = $furniture->m_assoc;

        //A string é transformada em array pela função explode
        $assocArray = explode(",", $assoc);

        //É feito a query do título e designer de cada ID presente em assocArray, junto de seu respectivo ID para consulta isolada 
        foreach ($assocArray as $assocItem){
            $mvAssoc = Movel::getMovel($assocItem);
            $designers .= ' |<a href="viewDesigners.php?id='.$mvAssoc->d_id.'">'.utf8_encode($mvAssoc->m_designers).'</a>| ';
            $resultAssoc .= '<li><a href="viewMoveis.php?id='.$mvAssoc->m_id.'">'.$mvAssoc->m_titulo.'</a></li>';
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
                </p><br><br><br><p>DESIGNERS:';

                $categoria = '</p><br><p>CATEGORIA: <a href="furnitures.php?filter='.$furniture->ct_id.'">'.utf8_encode($furniture->ct_nome).'</a></p><br><br><br><ul>';

                $business = '</ul><br><br><br>
                <p class="title">FAÇA NEGÓCIO:</p><br><br>
                <div class="buttons">
                <a href="https://wa.me/5511942104521?text=Olá%20!!%20Me%20Interressei%20pelo(a)%20'.$furniture->m_titulo.'%20de%20ID:%20'.$furniture->m_id.'.%20Podemos%20fazer%20contato?:)" target="_blank">
                    <button class="whatsapp">WhatsApp <img src="../../public/images/whatsapp.svg"
                            alt="whatsapp"></button></a>
                <a href="mailto:guilherme5932.ms@gmail.com?subject=CONTATO%20VIA%20SITE%20-%20NEGÓCIO:&body=Olá%20!!%20Me%20Interressei%20pelo(a)%20'.$furniture->m_titulo.'%20de%20ID:%20'.$furniture->m_id.'.%20Podemos%20fazer%20contato?:)" target="_blank">
                    <button class="gmail">Gmail <img src="../../public/images/gmail.svg" alt="gmail"></button></a>
                </div>
            </div>
        </div> 
        ';
    }else{
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
                <p>CATEGORIAS: <a href="furnitures.php?filter='.$furniture->ct_id.'">'.utf8_encode($furniture->ct_nome).'</a></p><br><br><br>
                <br><br><br>';

                $results2 = '<p class="title">FAÇA NEGÓCIO:</p><br><br>
                <div class="buttons">
                <a href="https://wa.me/5511942104521?text=Olá%20!!%20Me%20Interressei%20pelo(a)%20'.$furniture->m_titulo.'%20de%20ID:%20'.$furniture->m_id.'.%20Podemos%20fazer%20contato?:)" target="_blank">
                    <button class="whatsapp">WhatsApp <img src="../../public/images/whatsapp.svg"
                            alt="whatsapp"></button></a>
                <a href="mailto:guilherme5932.ms@gmail.com?subject=CONTATO%20VIA%20SITE%20-%20NEGÓCIO:&body=Olá%20!!%20Me%20Interressei%20pelo(a)%20'.$furniture->m_titulo.'%20de%20ID:%20'.$furniture->m_id.'.%20Podemos%20fazer%20contato?:)" target="_blank">
                    <button class="gmail">Gmail <img src="../../public/images/gmail.svg" alt="gmail"></button></a>
                </div>
            </div>
        </div> 
        ';
    }

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
    <link rel="stylesheet" type="text/css" href="../../public/css/scroll.css">

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
        <?=$designers?>
        <?=$categoria?>
        <?=$resultAssoc?>
        <?=$business?>
        <?=$results2?>
        <hr>
        <?php include 'includes/footer.php'?>
    </div>
</body>
</html>