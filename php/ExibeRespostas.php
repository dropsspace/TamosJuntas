<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="pt">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Estamos Juntas!</title>
        <!-- Bootstrap core CSS -->
        <link href="../vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
        <!-- Custom fonts for this template -->
        <link href="https://fonts.googleapis.com/css?family=Pacifico:400,700" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Satisfy:400,700" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Dancing Script:400,700" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
        <script src="js/jquery.min.js"></script>
        <script src="js/carrousselSlider.js"></script>
    </head>
    <body id="page-top">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="../index.html#">Estamos Juntas!</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fa fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="../index.html">Início</a>
                        </li>                                                           
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#services">Meu Resultado</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>        
        <section id="services">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class=bg-warning>
                                        <h2> Resultado: </h2>
                                    </th>
                                </tr>
                            </thead>

                            <?php
                            $risco = false;
                            $saudavel = false;
                            $abusivo = false;

                            if (count($_SESSION["violenciasIdentificadas"] > 0)) {
                                echo 'entrou';
                                for ($y = 0; $y < count($_SESSION["violenciasIdentificadas"]); $y++) {
                                    if ($_SESSION["violenciasIdentificadas"][x] == 5 || $_SESSION["violenciasIdentificadas"][x] == 4 || $_SESSION["violenciasIdentificadas"][x] == 3 || $_SESSION["violenciasIdentificadas"][x] == 2 || $_SESSION["violenciasIdentificadas"][x] == 1) {
                                        $abusivo = true;
                                    } else if ($_SESSION["violenciasIdentificadas"][y] == 6) {
                                        $risco = true;
                                    }
                                }
                            } else {
                                 echo 'entrou else';
                                $saudavel = true;
                            }



                            if ($abusivo) {
                                echo '<tr><th><img class="img-fluid" src="../img/result/abusivo.png" alt=""></th></tr>';
                                echo '<tr><th><h4 class="section-heading">Foi Identificado um Relacionamento Relacionamento Abusivo pois uma ou mais respostas refere-se à ações que configuram crime de violência contra a mulher conforme a lei 11.540/16: </h4></th></tr>';
                                if ($_SESSION["violenciasIdentificadas"][0] == 1) {
                                    echo '<tr><th class=bg-warning>Violencia patrimonial</th></tr>';
                                    echo '<tr><th>Esta violência é entendida como qualquer conduta que configure retenção, subtração, destruição parcial ou total de seus objetos, instrumentos de trabalho, documentos pessoais, bens, valores e direitos ou recursos econômicos, incluindo os destinados a satisfazer suas necessidades;</th></tr>';
                                }
                                if ($_SESSION["violenciasIdentificadas"][1] == 2) {
                                    echo '<tr><th class=bg-warning> Violencia sexual</th></tr>';
                                    echo '<tr><th>Esta violência é entendida como qualquer conduta que a constranja a presenciar, a manter ou a participar de relação sexual não desejada, mediante intimidação, ameaça, coação ou uso da força; que a induza a comercializar ou a utilizar, de qualquer modo, a sua sexualidade, que a impeça de usar qualquer método contraceptivo ou que a force ao matrimônio, à gravidez, ao aborto ou à prostituição, mediante coação, chantagem, suborno ou manipulação; ou que limite ou anule o exercício de seus direitos sexuais e reprodutivos;</th></tr>';
                                }
                                if ($_SESSION["violenciasIdentificadas"][2] == 3) {
                                    echo '<tr><th class=bg-warning>Violencia física </th></tr>';
                                    echo '<tr><th>Esta violência é entendida como qualquer conduta que ofenda sua integridade ou saúde corporal</th></tr>';
                                }
                                if ($_SESSION["violenciasIdentificadas"][3] == 4) {
                                    echo '<tr><th class=bg-warning>Violencia moral</th></tr>';
                                    echo '<tr><th>Esta violência é entendida como qualquer conduta que configure calúnia, difamação ou injúria.</th></tr>';
                                }
                                if ($_SESSION["violenciasIdentificadas"][4] == 5) {
                                    echo '<tr><th class=bg-warning>Violencia psicológica</th></tr>';
                                    echo '<tr><th>Esta violência é entendida como qualquer conduta que lhe cause dano emocional e diminuição da auto-estima ou que lhe prejudique e perturbe o pleno desenvolvimento ou que vise degradar ou controlar suas ações, comportamentos, crenças e decisões, mediante ameaça, constrangimento, humilhação, manipulação, isolamento, vigilância constante, perseguição contumaz, insulto, chantagem, ridicularização, exploração e limitação do direito de ir e vir ou qualquer outro meio que lhe cause prejuízo à saúde psicológica e à autodeterminação;</th></tr>';
                                }
                            }
                            if ($risco) {
                                echo '<tr><th><img class="img-fluid" src="../img/result/risco.png" alt=""></th></tr>';
                                echo '<tr><th>Relacionamento de Risco</th></tr>';
                                echo '<tr><th>É hora de olhar atentamente pois seu relacionamento apresenta sinais de risco, com atitudes que não são saudáveis!</th></tr>';
                            }
                            if ($saudavel) {
                                echo '<tr><td> <img class="img-fluid" src="../img/result/saudavel.png"></td></tr>';
                                echo '<tr><td align=left class=bg-warning><h4>Relacionamento Saudável</h4></td></tr>';
                                echo '<tr><td align=left><p class="section-result text-muted">Parabéns, você respondeu ao teste e não foram identificados traços de um relacionamento abusivo.'
                                . ' Não deixe de compartilhar este teste com suas amigas e mandar seu feedback na página inicial! </p></td></tr>';
                            }
                            ?> 
                            <tr>
                                <td align=right>   
                                    <a href="ExibeRespostas.html" class="btn btn-primary">Ver Minhas Respostas</a>
                                    <a href="../index.html" class="btn btn-primary">Testar Novamente</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div id="fb-root"></div>
                <script>(function (d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id))
                            return;
                        js = d.createElement(s);
                        js.id = id;
                        js.src = 'https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.11';
                        fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));</script>

                </body>
                <!-- Custom styles for this template -->
                <link href="../css/empodera.css" rel="stylesheet">

                <!-- Bootstrap core JavaScript -->
                <script src="../vendor/jquery/jquery.min.js"></script>
                <script src="../vendor/popper/popper.min.js"></script>
                <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

                <!-- Plugin JavaScript -->
                <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

                <!-- Contact form JavaScript -->
                <script src="../js/jqBootstrapValidation.js"></script>
                <script src="../js/contact_me.js"></script>

                <!-- Custom scripts for this template -->
                <script src="../js/empodera.js"></script>
                </html>

