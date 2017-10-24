<?php
include_once 'Quiz.php';
include_once 'Pergunta.php';

$quiz = new Quiz((date('dmyhis')), 0, 0, 0, 0);

$pergunta = $quiz->sorteiaPergunta(1);

$resposta = $quiz->selecionaResposta($idPergunta);



var_dump($pergunta);
 
?>
