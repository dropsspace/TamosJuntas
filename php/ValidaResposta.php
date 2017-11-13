<?php

include("config.php");

$quiz = new Quiz($mysql);

if (isset($_POST['check1']) || isset($_POST['check2']) || (isset($_POST['check3']))) {

    if (isset($_POST['check1'])) {
        $quiz->salvaResposta($_POST['check1']);
    }
    if (isset($_POST['check2'])) {
        $quiz->salvaResposta($_POST['check2']);
    }
    if (isset($_POST['check3'])) {
        $quiz->salvaResposta($_POST['check3']);
    }

    if (isset($_POST['check1'])) {
        $quiz->verificaViolência($_POST['check1']);
    } elseif (isset($_POST['check2'])) {
        $quiz->verificaViolência($_POST['check2']);
    } elseif (isset($_POST['check3'])) {
        $quiz->verificaViolência($_POST['check3']);
    }
}

if (isset($_POST['radiobtn'])) {
    $quiz->salvaResposta($_POST['radiobtn']);
    $quiz->verificaViolência($_POST['radiobtn']);
}

header("Location:Teste.php");
?>