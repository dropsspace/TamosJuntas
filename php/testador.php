<?php
include_once 'Quiz.php';
include_once 'Pergunta.php';

$quiz = new Quiz((date('dmyhis')), 0, 0, 0, 0);
$pergunta = $quiz->sorteiaPergunta(1);

var_dump($pergunta);
 
?>
