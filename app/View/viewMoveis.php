<?php
    //Carregamento das classes
    require __DIR__.'../../../vendor/autoload.php';

    use \App\Controller\Entity\Movel;
    use App\Controller\Entity\Curtido;

    //validação do ID recebido por GET
    if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
        header('location: furnitures.php?status=error');
        exit;
    }

    //Variáveis de construção HTML
    $results = '';
    $results2 = '';
    $resultAssoc = '';
    $dispo = '';
    $designers = '';
    $categoria = '';
    $business = '';
    $heart = 'heart.svg';
    $href = 'Like.php';

    //Objetos
    $furniture = Movel::getMovel($_GET['id']);
    $obCurtido = new Curtido;

    if(!isset($_SESSION)){
        session_start();

        if(!isset($_SESSION['login_session']) and  !isset($_SESSION['pass_session'])){
            session_destroy();
        }else{
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

            if($obCurtido->getCurtido($_GET['id'], $id)->rowCount() == 1){
                $heart = 'heartLike.png';
                $href = 'Deslike.php';
            }
            else{
                $heart = 'heart.svg';
                $href = 'Like.php';
            }
        }
        
    }
    

    //Construção e disponibilidade de acordo com o atributo m_qtdEstoque
    if($furniture->m_qtdEstoque <= 0){
        $dispo = '<span class="indis">INDISPONÍVEL</span>';
    }else{
        $dispo = '<span class="dis">DISPONÍVEL</span>';
    }

    //Construção da estrutura HTML do Móvel (caso seja de AMBIENTES ou não)
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
                    <p class="heart"><a href="../Model/'.$href.'?id='.$_GET['id'].'"><img src="../../public/images/'.$heart.'" alt="coração"></a></p>
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
                <p class="heart"><a href="../Model/'.$href.'?id='.$_GET['id'].'"><img src="../../public/images/'.$heart.'" alt="coração"></a></p>
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
    <link rel="stylesheet" type="text/css" href="../../public/css/modal.css">


    <link rel="preconnect" href="https://fonts.googleapis.com/%22%3E">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;0,800;1,100&display=swap"
        rel="stylesheet">
</head>

<body>
    <div id="container">
        <main>
            <div id="errorLike" class="modal">
                <div class="confirm-div">
                    <a href="#fechar" title="Fechar" class="fechar">x</a>
                    <p><img src="../../public/images/exclamacao.png" alt="Arquivo Vivo"></p>
                    <h1>LOGIN NECESSÁRIO</h1>
                    <p>Faça login para curtir um móvel.</p>
                    <p><a href="index.php#loginModal"><button class="btn-redirect-login" style="cursor: pointer;">LOGIN</button></a></p>
                </div>
            </div>
        </main>
    <?php include 'includes/header.php'?>
        <button id="back" onClick="history.go(-1)"><img src="../../public/images/arrow.png" alt="arrow"></button>
        <hr>
        <br>
        <?=$results?>
        <?=$designers?>
        <?=$categoria?>
        <?=$resultAssoc?>
        <?=$business?>
        <?=$results2?>
        <br>
        <hr>
        <?php include 'includes/footer.php'?>
    </div>
</body>
</html>