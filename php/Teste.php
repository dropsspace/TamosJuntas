<?php
include("config.php");

$quiz = new Quiz($mysql);
?>
<html>

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

    <body>
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">Estamos Juntas!</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fa fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger " href="../index.html">Sobre o Projeto</a>
                        </li>     
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#teste">Teste Seu Relacionamento</a>
                        </li>  
                    </ul>
                </div>
            </div>
        </nav>  
        
        <section id ="teste">
            <div>
             
                <?php
                #include_once 'Quiz.php';
                #include_once 'Pergunta.php';
                $quiz->validateste();

                if ($_SESSION["terminouTeste"] == false) {
                    echo "<h3> Pergunta "  .(count($_SESSION["perguntas"]) +1)."</h2>";
                    $tipoPergunta = $quiz->validaTipoViolencia();
                    $pergunta = $quiz->validaPergunta($tipoPergunta);
                    $resposta = $quiz->selecionaResposta($pergunta[0]['IDpergunta']);
                    $quiz->controlador($pergunta[0]['IDtpViolencia']);
             
                    echo "<h4 class=subheading>". $pergunta[0]["pergunta"] ."</h3>";
                    if ($pergunta[0]["tpResposta"] == "R") {
                        ?>
                        <form action = "ValidaResposta.php" method="post">
                            <?php $var1 = $resposta[0]['IDresposta']; ?>
                            <?php $var2 = $resposta[1]['IDresposta']; ?>

                            <div>
                                <label><input type = "radio" checked name = "radiobtn" value= "<?php echo $var1 ?>"><?php echo($resposta[0]['simnao']); ?>  </label> 
                            </div>                
                            <div>
                                <label><input type = "radio" name = "radiobtn" value="<?php echo $var2 ?>"><?php echo($resposta[1]['simnao']); ?></label>
                            </div>
                            <div>
                                <button class="btn btn-primary" type="submit"  onclick=""> Próxima </button> </div>
                        </form>

                        <?php
                    } else {
                        ?>
                        <form action = "ValidaResposta.php" method="post">

                            <div class = "checkbox">
                                <label><input type = "checkbox" name = "check1" value="<?php echo $resposta[0]['IDresposta']; ?>"><?php echo $resposta[0]['resposta']; ?></label>
                            </div>
                            <div class = "checkbox">
                                <label><input type = "checkbox" name = "check2" value="<?php echo $resposta[1]['IDresposta']; ?>"><?php echo $resposta[1]['resposta']; ?></label>
                            </div>            
                            <div class = "checkbox">
                                <label><input type = "checkbox" name = "check3" value="<?php echo $resposta[2]['IDresposta']; ?>"><?php echo $resposta[2]['resposta']; ?></label>
                            </div>
                            <button class="btn btn-primary" type="submit"> Próxima </button>

                        </form>

                        <?php
                    }
                    print_r($_SESSION);
                } else {
                    echo 'acabou';
                    //header("Location:ExibeResult.php");
                }
                ?>
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
