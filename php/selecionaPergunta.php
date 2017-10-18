<?php

include_once("dbEstamosJuntas.php");

//No início do teste sorteia x perguntas de cada grupo de forma aleatória 
//Quando o sistema identificar um tipo de violência, ele para de perguntar sobre aquele tipo. 
//Enquanto não identifica, continua sorteando mais y perguntas para a mulher responder.
//Até identificar a situação de  violência ou concluir que ela não sofre aquele tipo
//variavel que tras o tipo da violência para sortear a pergunta 
//$tpviolencia = $_POST['tpviolencia'];
//estancia banco de dados
$objDB = new dbEstamosJuntas();
$link = $objDB->conectaMysql();

//select de todas as perguntas
$selectpergunta = "SELECT * FROM tbpergunta WHERE IDtpViolencia = 1";
$resultadopergunta = mysqli_query($link, $selectpergunta);

if ($resultadopergunta) {
    while ($dadospergunta = mysqli_fetch_array($resultadopergunta, MYSQLI_ASSOC)) {
        $arrayperguntas[] = $dadospergunta;
    }

//gera um valor randômico para buscar a pergunta bseado na quantidade de registros do selct
    $numero = count($arrayperguntas);
    $randomico = rand(0, $numero);
    $perguntaselecionada = $arrayperguntas($randomico);

    //valida pergunta pra ver se já foi selecionada 
    
//se tpResposta == R : chama o post enviando a pergunta pro index 
//se não, se tpResposta == C : pega ID a pergunta selecionada e busca as respostas 

    $resposta = "SELECT * FROM tbresposta WHERE IDpergunta = '$idPergunta'";
    $resultadoresp = mysqli_query($link, $resposta);

    if ($resultadopergunta) {
        while ($dadosresposta = mysqli_fetch_array($resultadoresp, MYSQLI_ASSOC)) {
            $arrayrespostas[] = $dadosresposta;
        }
    }
//envia array de respostas para index
    
        } else {
    echo "Erro na execução da consulta";
}
?>