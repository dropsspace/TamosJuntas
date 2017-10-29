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

        $quiz = new Quiz((date('dmyhis')), 0, 0, 0, 0);
        $resultadoFinal = false;

        //while ($resultadoFinal == false) {

        $tipoPergunta = $quiz->sorteiaTipoViolencia();
        $pergunta = $quiz->sorteiaPergunta($tipoPergunta['IDtpViolencia']);
        $resposta = $quiz->selecionaResposta($pergunta['IDpergunta']);

        echo($pergunta["pergunta"]);
        if ($pergunta["tpResposta"] == "R") {
            ?>
            <form action="quiz.php" method="post">
                <div class = "radio">
                    <label><input type = "radio" name = "radioSim" value="1">Sim</label>
                </div>
                <div class = "radio">
                    <label><input type = "radio" name = "radioNao" value="0">Não</label>
                </div>
                <button class="btn btn-primary" type="submit"  onclick="myFunction()"> Próxima </button>

            </form>
            <?php
        } else {
            ?>
            <form action="quiz.php" method="post">

                <div class = "checkbox">
                    <label><input type = "checkbox" name = "check1" value="<?php $resposta[0]['IDresposta']; ?>"><?php echo $resposta[0]['resposta']; ?></label>
                </div>
                <div class = "checkbox">
                    <label><input type = "checkbox" name = "check2" value="<?php $resposta[1]['IDresposta']; ?>"><?php echo $resposta[1]['resposta']; ?></label>
                </div>            
                <div class = "checkbox">
                    <label><input type = "checkbox" name = "check3" value="<?php $resposta[2]['IDresposta']; ?>"><?php echo $resposta[2]['resposta']; ?></label>
                </div>
                <button class="btn btn-primary" type="submit"> Próxima </button>

            </form>

            <?php
        }
        //quando selecionar e der próxima
        $quiz->salvaResposta(2);
//                var_dump($quiz::$arrayRespostas[0]['idUso']);
//                echo '<br>';
//                var_dump($quiz::$arrayRespostas[0]['idResp']);
//                
        //$resultadoFinal = $quiz->resultadoFinal();
        //}
        ?>

    </body>
</html>
