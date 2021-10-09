<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../public/css/home.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/header.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/footer.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/modal.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/animations.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>

    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;0,800;1,100&display=swap" rel="stylesheet">
    <title>Arquivo Vivo - Home</title>
</head>

<body>
    <div id="container">
        <?php
        include 'includes/header.php';
        ?>
        <main>
            <div class="img-carousel" style="background-image: url(../../public/images/carousel.svg);background-size: cover;">
                <h1 class="animate-up">ARQUIVO VIVO MÓVEIS</h1>
                <p class="animate-up">
                    Móveis <strong>ORIGINAIS</strong>, 100%
                    <strong>SUSTENTÁVEIS</strong> fazendo sempre o seu mais refinado
                    <strong>ESTILO</strong>
                </p>
                <div class="group-buttons">
                    <button class="btn-cadaster animate-up-buttons" onclick="window.location.href = '#cadasterModal'">cadastrar</button>
                    <button class="btn-login animate-up-buttons" onclick="window.location.href = '#loginModal'">login</button>
                    <button class="btn-portfolio animate-up-buttons" onclick="window.location.href = 'furnitures.php'">portfólio</button>
                </div>
            </div>
            <div id="confirmCadasterModal" class="modal">
                <div class="confirm-div">
                    <a href="#fechar" title="Fechar" class="fechar">x</a>
                    <p><img src="../../public/images/checked.svg" alt="Arquivo Vivo"></p>
                    <h1>CADASTRO EFETUADO COM SUCESSO!!!</h1>
                    <p>Logue para acessar o seu perfil e curtir móveis :)</p>
                    <p><button class="btn-redirect-login">LOGIN</button></p>
                </div>
            </div>
            <div id="cadasterModal" class="modal">
                <div class="cadaster-div">
                    <a href="#fechar" title="Fechar" class="fechar">x</a>
                    <p><img src="../../public/images/cadaster-logo.svg" alt="Arquivo Vivo"></p>
                    <form method="post" action="../Model/Register.php">
                        <div>
                            <label for="name">nome:</label>
                            <input type="text" name="name">
                        </div>
                        <div>
                            <label for="lastName">sobrenome:</label>
                            <input type="text" name="lastName">
                        </div>
                        <div>
                            <label for="email">email:</label>
                            <input type="text" name="email">
                        </div>
                        <div>
                            <label for="password">senha:</label>
                            <input type="text" name="password">
                        </div>
                        <div>
                            <label for="confirmPassword">confirmar senha:</label>
                            <input type="text" name="confirmPassword">
                        </div>
                        <p><button type="submit">CADASTRAR</button></p>
                        <p><a href="#">Já possuo cadastro</a></p>
                    </form>

                </div>
            </div>
            <div id="loginModal" class="modal">
                <div class="login-div">
                    <a href="#fechar" title="Fechar" class="fechar">x</a>
                    <p><img src="../../public/images/login-logo.svg" alt="Arquivo Vivo"></p>
                    <form action="">
                        <div>
                            <label for="email">email:</label>
                            <input type="text" name="email">
                        </div>
                        <div>
                            <label for="password">senha:</label>
                            <input type="text" name="password">
                        </div>
                        <p><button type="submit">LOGAR</button></p>
                        <span>
                            <a href="#" class="forget">Esqueceu sua senha?</a>
                            <a href="#" class="cadaster">Não possui cadastro?</a>
                        </span>
                    </form>

                </div>
            </div>
        </main>
        <section>
            <div class="aboutUs">
                <h1>QUEM SOMOS?</h1><br>
                <hr><br>
                <div class="flex-about">
                    <div class="paragraph">
                        <p>Quantas vidas tem um sofá? Quantas vidas tem a cadeira de uma sala de jantar ou a mesa de um
                            escritório?
                            Assim nasceu a Arquivovivo: para dar mais vida às coisas da nossa vida.</p><br>
                        <p>Hoje criamos empregos, geramos negócios e respeitamos os recursos naturais do planeta em
                            todas os
                            processo.
                            Ou seja, cumprimos todas as exigências que uma empresa 100% sustentável tem que cumprir. E
                            vamos
                            além:
                            resgatamos a cultura, a arte, o design e de alguma maneira, a história em cada um dos seus
                            produtos.
                        </p><br>
                        <p>Portanto, todo cliente que compõe seus ambientes com Arquivovivo dá sua contribuição ao
                            planeta,
                            através de uma atitude sustentável e sua contribuição cultural, mantendo viva a cultura
                            universal
                            através do design e da arte de seus criadores.</p><br>
                    </div>
                    <p style="text-align: center;"><img src="../../public/images/eric.svg" alt="Eric" width="200px"></p>
                </div>
            </div>
            <div class="sample">
                <h1>AMOSTRA</h1><br>
                <hr><br>
                <div class="container-furnitures">
                    <div class="sample-furniture">
                        <div style="background-image: url(../../public/images/cadeira2.jpg);"></div>
                    </div>
                    <div class="sample-furniture">
                        <div style="background-image: url(../../public/images/cadeira2.jpg);"></div>
                    </div>
                    <div class="sample-furniture">
                        <div style="background-image: url(../../public/images/cadeira2.jpg);"></div>
                    </div>
                    <div class="sample-furniture">
                        <div style="background-image: url(../../public/images/cadeira2.jpg);"></div>
                    </div>
                    <div class="sample-furniture">
                        <div style="background-image: url(../../public/images/cadeira2.jpg);"></div>
                    </div>
                </div>
                <div class="container-furnitures">
                    <div class="sample-furniture">
                        <div style="background-image: url(../../public/images/cadeira2.jpg);"></div>
                    </div>
                    <div class="sample-furniture">
                        <div style="background-image: url(../../public/images/cadeira2.jpg);"></div>
                    </div>
                    <div class="sample-furniture">
                        <div style="background-image: url(../../public/images/cadeira2.jpg);"></div>
                    </div>
                    <div class="sample-furniture">
                        <div style="background-image: url(../../public/images/cadeira2.jpg);"></div>
                    </div>
                    <div class="sample-furniture">
                        <div style="background-image: url(../../public/images/cadeira2.jpg);"></div>
                    </div>
                </div>
            </div>
            <div class="location">
                <h1>LOCALIZAÇÃO e CONTATO</h1><br>
                <hr><br>
                <div class="flex-location">
                    <div id="mapid"></div>
                    <div class="address-contact">
                        <div>
                            <h1>Endereço:</h1>
                            <p>Rua Lira, 159. Vila Madalena, São Paulo - SP.</p>
                            <h1 class="contact-h1">Contato:</h1>
                            <p>Telefone: +55 (11) 3034-1279</p>
                            <p>WhatsApp: +55 (11) 95607-3034</p>
                            <p>Email: <a href="mailto:vendas@arquivovivomoveis.com.br" style="text-decoration: none;">vendas@arquivovivomoveis.com.br</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="social">
                <h1>MÍDIAS SOCIAIS</h1><br>
                <hr><br>
                <div id="social-container">
                    <a href="https://www.instagram.com/arquivovivo/" target="_blank">
                        <div class="instagram">
                            <img src="../../public/images/instagram.svg" alt="instagram">
                            <h2>INSTAGRAM</h2>
                        </div>
                    </a>
                    <a href="https://www.facebook.com/arquivovivo/" target="_blank">
                        <div class="facebook">
                            <img src="../../public/images/facebook.svg" alt="facebook">
                            <h2>FACEBOOK</h2>
                        </div>
                    </a>
                </div>
            </div>
        </section>
        <?php
        include 'includes/footer.php'
        ?>
    </div>
    <script src="../../public/scripts/map-index.js"></script>
</body>

</html>