<?php
include("config.php");
$resultado = new RegistraResultadoTeste($mysql);
$perguntas = new Pergunta($mysql);
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
                            <a class="nav-link js-scroll-trigger" href="ExibeResultado.php">Meu Resultado</a>
                        </li>  
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#services">Minhas Respostas</a>
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
                                    <th class=bg-warning><h4>Pergunta</h4></th>
                                    <th class=bg-warning><h4>Resposta</h4></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $rs = $resultado->getRespostas($_SESSION["id"]);

                                for ($x = 0; $x < count($rs); $x++) {
                                    $resposta = $perguntas->verResposta($rs[$x]["IdResposta"]);
                                    //print_r($resposta);
                                    //echo '<br>';
                                    $pergunta = $perguntas->verPergunta($resposta[0]["IDpergunta"]);
                                    ?>

                                    <tr>
                                        <td>
                                            <?php
                                            echo utf8_encode($pergunta[0]["pergunta"]);
                                            ?>
                                        </td>

                                        <?php
                                        if ($pergunta[0]["tpResposta"] == "R") {
                                            if ($resposta[0]['simnao'] == "Sim") {
                                                echo '<td class=bg-danger><p>' . utf8_encode($resposta[0]['simnao']);
                                            } else {
                                                echo '<td class=bg-success><p>' . utf8_encode($resposta[0]['simnao']);
                                            }
                                        } else {
                                            echo '<td class=bg-danger><p>' . utf8_encode($resposta[0]['resposta']);
                                        }
                                    }
                                    ?>
                                    </p></td>
                                </tr>                           
                            </tbody>
                        </table>
                        <div class="container" align = "center">
                            <table>
                                <tr>
                                    <td colspan="2" align = "center"><p><b> Legenda </b></p></td>
                                </tr>
                                <tr> 
                                    <td class=bg-danger><p> Resposta </p></td><td> <p>Indica Ação Abusiva</p></td>
                                </tr>
                                <tr>
                                    <td class=bg-success><p> Resposta</p></td><td><p>Indica Ação Saudável</p></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

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


