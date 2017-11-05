<?php

include_once 'Quiz.php';

if (isset($_POST['check1']) || isset($_POST['check2']) || (isset($_POST['check3']))) {

    if (isset($_POST['check1'])) {
        Quiz::salvaResposta($_POST['check1']);
    }
    if (isset($_POST['check2'])) {
        Quiz::salvaResposta($_POST['check2']);
    }
    if (isset($_POST['check3'])) {
        Quiz::salvaResposta($_POST['check3']);
    }

    if (isset($_POST['check1'])) {
        $_SESSION['resultadoFinal'] = Quiz::verificaViolência($_POST['check1']);
    } elseif (isset($_POST['check2'])) {
        $_SESSION['resultadoFinal'] = Quiz::verificaViolência($_POST['check2']);
    } elseif (isset($_POST['check3'])) {
        $_SESSION['resultadoFinal'] = Quiz::verificaViolência($_POST['check3']);
    }
}

if (isset($_POST['radiobtn'])) {
    Quiz::salvaResposta($_POST['radiobtn']);
    $_SESSION['resultadoFinal'] = Quiz::verificaViolência($_POST['radiobtn']);
}

header("Location:Teste.php");
?>