<?php
include("config.php");
?>
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
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #222222;" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="../index.php">Estamos Juntas!</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fa fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="../index.php">Início</a>
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
                        <?php
                        $risco = false;
                        $saudavel = false;
                        $abusivo = false;
                        $patrimonial = false;
                        $sexual = false;
                        $fisica = false;
                        $moral = false;
                        $psicologica = false;

                        //print_r($_SESSION);
                        if (count($_SESSION["violenciasIdentificadas"] > 0)) {
                            for ($y = 0; $y < count($_SESSION["violenciasIdentificadas"]); $y++) {
                                if ($_SESSION["violenciasIdentificadas"][$y] == 5 || $_SESSION["violenciasIdentificadas"][$y] == 4 || $_SESSION["violenciasIdentificadas"][$y] == 3 || $_SESSION["violenciasIdentificadas"][$y] == 2 || $_SESSION["violenciasIdentificadas"][$y] == 1) {
                                    $abusivo = true;
                                    if ($_SESSION["violenciasIdentificadas"][$y] == 1) {
                                        $patrimonial = true;
                                    }
                                    if ($_SESSION["violenciasIdentificadas"][$y] == 2) {
                                        $sexual = true;
                                    }
                                    if ($_SESSION["violenciasIdentificadas"][$y] == 3) {
                                        $fisica = true;
                                    }
                                    if ($_SESSION["violenciasIdentificadas"][$y] == 4) {
                                        $moral = true;
                                    }
                                    if ($_SESSION["violenciasIdentificadas"][$y] == 5) {
                                        $psicologica = true;
                                    }
                                } else if ($_SESSION["violenciasIdentificadas"][$y] == 6) {
                                   $risco = true;       
                                }
                            }
                            if (!$abusivo && !$patrimonial && !$sexual && !$fisica && !$moral && !$psicologica && !$risco) {
                               $saudavel = true;
                            }
                        }
                        ?>
                        <table class="table table-bordered">
                            <?php
                            if ($abusivo) {
                                echo'<thead><tr><th class=bg-warning><h2> Resultado:</h2></th></tr></thead>';
                                echo '<tr><td><img class="img-fluid" src="../img/result/abusivo.png" alt=""></th></tr>';
                                echo'<thead><tr><th class=bg-warning><h3> Relacionamento Abusivo </h3></th></tr></thead>';
                                echo '<tr><td><p class="item-intro">Uma ou mais respostas referem-se à ações que configuram crime de violência contra a mulher conforme a lei 11.540/16:</p></th></tr>';

                                if ($patrimonial) {
                                    echo '<tr><td class=bg-warning><h5>Violência patrimonial</h5></th></tr>';
                                    echo '<tr><td><p class="item-intro">Esta violência é entendida como qualquer conduta que configure retenção, subtração, destruição parcial ou total de seus objetos, instrumentos de trabalho, documentos pessoais, bens, valores e direitos ou recursos econômicos, incluindo os destinados a satisfazer suas necessidades;</p></th></tr>';
                                }
                                if ($sexual) {
                                    echo '<tr><td class=bg-warning><h5> Violência sexual</h5></th></tr>';
                                    echo '<tr><td><p class="item-intro">Esta violência é entendida como qualquer conduta que a constranja a presenciar, a manter ou a participar de relação sexual não desejada, mediante intimidação, ameaça, coação ou uso da força; que a induza a comercializar ou a utilizar, de qualquer modo, a sua sexualidade, que a impeça de usar qualquer método contraceptivo ou que a force ao matrimônio, à gravidez, ao aborto ou à prostituição, mediante coação, chantagem, suborno ou manipulação; ou que limite ou anule o exercício de seus direitos sexuais e reprodutivos;</p></th></tr>';
                                }
                                if ($fisica) {
                                    echo '<tr><td class=bg-warning><h5> Violência física </h5></th></tr>';
                                    echo '<tr><td><p class="item-intro">Esta violência é entendida como qualquer conduta que ofenda sua integridade ou saúde corporal.</p></th></tr>';
                                }
                                if ($moral) {
                                    echo '<tr><td class=bg-warning><h5>Violência moral</h5></th></tr>';
                                    echo '<tr><td><p class="item-intro">Esta violência é entendida como qualquer conduta que configure calúnia, difamação ou injúria.</p></th></tr>';
                                }
                                if ($psicologica) {
                                    echo '<tr><td class=bg-warning><h5>Violência psicológica</h5></th></tr>';
                                    echo '<tr><td><p class="item-intro">Esta violência é entendida como qualquer conduta que lhe cause dano emocional e diminuição da auto-estima ou que lhe prejudique e perturbe o pleno desenvolvimento ou que vise degradar ou controlar suas ações, comportamentos, crenças e decisões, mediante ameaça, constrangimento, humilhação, manipulação, isolamento, vigilância constante, perseguição contumaz, insulto, chantagem, ridicularização, exploração e limitação do direito de ir e vir ou qualquer outro meio que lhe cause prejuízo à saúde psicológica e à autodeterminação.</p></th></tr>';
                                }
                            } else if ($risco) {
                                echo'<thead><tr><th class=bg-warning><h2> Resultado: </h2></th></tr></thead>';
                                echo '<tr><th><img class="img-fluid" src="../img/result/risco.png" alt=""></th></tr>';
                                echo'<thead><tr><th class=bg-warning><h3> Relacionamento de Risco </h3></th></tr></thead>';
                                echo '<tr><th><p class="item-intro">É hora de olhar atentamente pois seu relacionamento apresenta sinais de risco, com atitudes que não são saudáveis!</p></th></tr>';
                            }
                            if ($saudavel) {
                                echo'<thead><tr><th class=bg-warning><h2> Resultado:  </h2></th></tr></thead>';
                                echo '<tr><td> <img class="img-fluid" src="../img/result/saudavel.png"></td></tr>';
                                echo'<thead><tr><th class=bg-warning><h3> Relacionamento Saudável </h3></th></tr></thead>';
                                echo '<tr><td align=left><p class="item-intro">Parabéns, você respondeu ao teste e não foram identificados traços de um relacionamento abusivo.'
                                . ' Não deixe de compartilhar este teste com suas amigas e mandar seu feedback na página inicial! </p></td></tr>';
                            }

                            if ($abusivo || $risco) {
                                echo '<tr> <td align=right>';
                                echo '<a class="btn btn-primary portfolio-link" data-toggle="modal" href="#denuncie1">Como Denunciar a Violência?</a> ';
                                echo '<a href="ExibeRespostas.php" class="btn btn-primary">Ver Minhas Respostas</a> ';
                                echo '<a href="../index.php" class="btn btn-primary">Testar Novamente</a>';
                                echo '</td></tr>';
                            } else if ($saudavel) {
                                echo '<tr> <td align=right>';
                                echo '<a href="ExibeRespostas.php" class="btn btn-primary">Ver Minhas Respostas</a> ';
                                echo '<a href="../index.php" class="btn btn-primary">Testar Novamente</a></td></tr>';
                            }
                            ?>                                 
                        </table>                             
                    </div>
                </div>
            </div>
        </section>

        <!-- Modal 1  Lei Maria da Penha-->
        <div class="portfolio-modal modal fade" id="denuncie1" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal">
                        <div class="lr">
                            <div class="rl"></div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <div class="modal-body">
                                    <h2>Você não está sozinha!</h2>  
                                    <p>A denúncia de violência doméstica pode ser feita em qualquer delegacia, com o registro de um boletim de ocorrência, ou pela Central de Atendimento à Mulher (Ligue 180). A denúncia é anônima e gratuita, disponível 24 horas, em todo o país.
                                    </p>
                                    <p>Ao registrar o boletim de ocorrência em uma delegacia, você pode entrar com uma medida protetiva sob a Lei Maria da Penha que obriga o agressor a se manter longe. </p>
                                    <p>As prefeituras também oferecem centros atendimento, que acolhem as mulheres em situação de violência  oferecendo apoio social, jurídico e psicológico sem precisar de boletim de ocorrência.</p> 
                                    <div class="modal-body">
                                        <!-- Project Details Go Here -->
                                        <h3>Disque 180</h3>
                                        <img class="img-fluid d-block mx-auto" src="img/projetos/icon180.png" alt="">
                                        <p>
                                            O Ligue 180 foi criado para servir de canal direto de orientação sobre direitos e serviços públicos para a população feminina em todo o país (a ligação é gratuita). 

                                            Ele é aporta principal de acesso aos serviços que integram a rede nacional de enfrentamento à violência contra a mulher, sob amparo da Lei Maria da Penha, e base de dados privilegiada para a formulação das políticas do governo federal nessa área. 
                                        </p>                                           
                                        <a href="http://www.spm.gov.br/ligue-180" target="_blank"> <button class="btn btn-primary" type="submit">                 
                                                Saber Mais</button> </a>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Project Details Go Here -->
                                        <h3>Mapa da Justiça</h3>                                    
                                        <img class="img-fluid d-block mx-auto" src="img/projetos/iconMapa.png" alt="">
                                        <p>
                                            O Mapa da Justiça fornece uma localização da Rede de Atendimento às mulheres, que reúne ações e serviços das áreas da assistência social, justiça, segurança pública e saúde, integrando a Rede de Enfrentamento, ao contemplar o eixo de assistência previsto na Política Nacional de Enfrentamento à Violência Contra as Mulheres.
                                        </p>                                           
                                        <a href="http://sistema3.planalto.gov.br/spmu/atendimento/atendimento_mulher.php" target="_blank"> <button class="btn btn-primary" type="submit">                 
                                                Ver Mapa da Rede </button> </a>
                                    </div>
                                    <div class="modal-body"><!-- Project Details Go Here -->
                                        <h3>Lei 11.340/2006</h3>
                                        <p class="item-intro"> 
                                        </p>
                                        <img class="img-fluid d-block mx-auto" src="img/projetos/iconMariaPenha.png" alt="">
                                        <p>	
                                            A Lei Maria da Penha cria mecanismos para coibir a violência doméstica e familiar contra a mulher e 
                                            dispõe sobre a criação dos Juizados de Violência Doméstica e Familiar contra a Mulher;
                                            altera o Código de Processo Penal, o Código Penal e a Lei de Execução Penal;
                                            e tipifica as formas de violência doméstica e familiar contra a mulher.
                                        </p> 
                                        <a href="http://www.planalto.gov.br/ccivil_03/_ato2004-2006/2006/lei/l11340.htm" target="_blank"> <button class="btn btn-primary" type="submit">                 
                                                Ver Lei Integral</button> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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

