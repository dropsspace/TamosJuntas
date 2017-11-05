<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php
        include_once 'Quiz.php';
        include_once 'Pergunta.php';
        print_r($_SESSION["terminouTeste"]);
       
        if ($_SESSION["terminouTeste"] == false) {
            
            $tipoPergunta = Quiz::validaTipoViolencia();
            //adiciona +1 no contador de perguntas para tpViolencia
            Quiz::controlador($idViolencia);
            $pergunta = Quiz::validaPergunta($tipoPergunta);            
            $resposta = Quiz::selecionaResposta($pergunta[0]['IDpergunta']);
            

            echo($pergunta[0]["pergunta"]);
            if ($pergunta[0]["tpResposta"] == "R") {
                ?>
                <form action = "ValidaResposta.php" method="post">
                    <?php $var1 = $resposta[0]['IDresposta']; ?>
                    <?php $var2 = $resposta[1]['IDresposta']; ?>

                    <div>
                        <label><input type = "radio" name = "radiobtn" value="<?php echo $var1 ?>"><?php echo($resposta[0]['simnao']); ?></label> 
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
                       
            header("Location:ExibeResult.php");
        }
        ?>
    </body>
</html>
