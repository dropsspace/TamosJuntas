<?php
include_once 'Quiz.php';
include_once 'Pergunta.php';

$quiz = new Quiz((date('dmyhis')), 0, 0, 0, 0);
$pergunta = $quiz->sorteiaPergunta(1);
$resposta = $quiz->selecionaResposta($pergunta[47]);

echo $pergunta['pergunta'];
echo $resposta[0]['resposta'];
echo $resposta[1]['resposta'];
echo $resposta[2]['resposta'];

 
?>
