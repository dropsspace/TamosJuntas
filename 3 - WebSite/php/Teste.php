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
                            <a class="nav-link js-scroll-trigger " href="../index.php">Início</a>
                        </li>     
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#teste">Teste Seu Relacionamento</a>
                        </li>  
                    </ul>
                </div>
            </div>
        </nav>  

        <section id ="teste">
            <div class="container">
                <table class="table table-bordered">
                    <thead>
                        <tr>                            
                            <?php
                            
                            $quiz->validateste();
                            if ($_SESSION["terminouTeste"] == false) {
                                echo "<th class=bg-warning><h3> Pergunta " . (count($_SESSION["perguntas"]) + 1) . "</h2></th></tr></thead>";
                                $tipoPergunta = $quiz->validaTipoViolencia();
                                $pergunta = $quiz->validaPergunta($tipoPergunta);
                                $resposta = $quiz->selecionaResposta($pergunta[0]['IDpergunta']);
                                $quiz->controlador($pergunta[0]['IDtpViolencia']);
                                echo "<tbody><tr><td><h4 class=subheading>" . utf8_encode($pergunta[0]["pergunta"]) . "</h3></td></tr>";
                                if ($pergunta[0]["tpResposta"] == "R") {
                                    ?>
                            <form action = "ValidaResposta.php" method="post">
                                <?php $var1 = $resposta[0]['IDresposta']; ?>
                                <?php $var2 = $resposta[1]['IDresposta']; ?>
                                <tr>
                                    <td> 
                                        <label><input type = "radio" checked name = "radiobtn" value= "<?php echo $var1 ?>"><?php echo utf8_encode($resposta[0]['simnao']); ?>  </label> 
                                    </td> 
                                </tr> 
                                <tr>
                                    <td> 
                                        <label><input type = "radio" name = "radiobtn" value="<?php echo $var2 ?>"><?php echo utf8_encode($resposta[1]['simnao']); ?></label>
                                    </td> 
                                </tr>  
                                <tr>
                                    <td align=right>
                                        <button class="btn btn-primary" type="submit"  onclick=""> Próxima </button> </div>
                                    </td> 
                                </tr>     
                                </tbody>
                            </form>

                            <?php
                        } else {
                            ?>
                            <form action = "ValidaResposta.php" method="post">
                                <tr>
                                    <td> 
                                        <label><input type = "checkbox" name = "check1" value="<?php echo $resposta[0]['IDresposta']; ?>"><?php echo utf8_encode($resposta[0]['resposta']); ?></label>
                                    </td> 
                                </tr>  
                                <tr>
                                    <td> 
                                        <label><input type = "checkbox" name = "check2" value="<?php echo $resposta[1]['IDresposta']; ?>"><?php echo utf8_encode ($resposta[1]['resposta']); ?></label>
                                    </td> 
                                </tr>
                                <tr>
                                    <td> 
                                        <label><input type = "checkbox" name = "check3" value="<?php echo $resposta[2]['IDresposta']; ?>"><?php echo utf8_encode($resposta[2]['resposta']); ?></label>
                                    </td> 
                                </tr>
                                <tr>
                                    <td align=right> 
                                        <button class="btn btn-primary" type="submit"> Próxima </button>
                                    </td> 
                                </tr>
                                </tbody>
                            </form>
                        </table>
                        <?php
                    }
                    //print_r($_SESSION);
                } else {
                    header("Location:ResultadoTeste.php");
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
