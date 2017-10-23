<?php

include_once 'Pergunta.php';
include_once 'RegistroUso.php';

class Quiz {

    public static $arrayRespostas = array();
    public static $idUso;
    public static $arrayResultadoFinal = array();

    public function construct($dtaAcesso, $filhos, $estuda, $trabalha, $tpRelacionamento) {
        Quiz::registraUso($dtaAcesso, $filhos, $estuda, $trabalha, $tpRelacionamento);
    }

    public function salvaResposta($idResp) {
        array_push(self::$arrayRespostas, array("idUso" => self::$idUso, "idResp" => $idResp));
    }

    public function verificaViolência($idResp) {
        $resposta = Pergunta::verResposta($idResp);
        if ($resposta['simnao']) {
            if ($resposta['simnao'] == 'sim') {
                array_push(self::$arrayResultadoFinal, array("idUso" => self::$idUso, "idTpViolencia" => $resposta[IDpergunta]));
                //verificar se tem como eu pegar tpViolência a partir da pergunta
            }
        } else {
            array_push(self::$arrayResultadoFinal, array("idUso" => self::$idUso, "idTpViolencia" => $resposta[IDpergunta]));
        }
    }

    public function sorteiaPergunta($tpPergunta) {

        $pergunta = Pergunta::selecionaPergunta($tpPergunta);
        $idPergunta = $pergunta['IDpergunta'];
        $controlador = false;
        while ($controlador == false) {
            // if (array_key_exists($pergunta['IDpergunta'], self::$arrayRespostas))
            if (in_array($idPergunta, self::$arrayRespostas)) {
                $controlador = true;
            } else {
                $pergunta = Pergunta::selecionaPergunta($tpPergunta);
                $idPergunta = $pergunta['IDpergunta'];
            }
        }
        //e se todas tiverem sido perguntadas?
        return $idPergunta;
    }

    public function selecionaResposta($idPergunta) {
        $resposta = Pergunta::selecionaRespostas($idPergunta);
        return $resposta;
    }

    public function registraUso($dtaAcesso, $filhos, $estuda, $trabalha, $tpRelacionamento) {
        self::$idUso = RegistroUso::registraUso($dtaAcesso, $filhos, $estuda, $trabalha, $tpRelacionamento);
    }

    public function resultadoTeste() {

        foreach (self::$arrayRespostas as $arrayFinal) {
            ResultadoTeste::resgistaResult($arrayFinal['idUso'], $arrayFinal['idResp']);
        }
    }

}

//$idUso1 = 11;
//$idResp1 = 22;
//
//Quiz::salvaResposta($idUso1, $idResp1);
//$var = Quiz::exibeArray();
//
//$idUso2 = 14;
//$idResp2 = 24;
//
//Quiz::salvaResposta($idUso2, $idResp2);
//$var = Quiz::exibeArray();
//
//
//foreach ($var as $item) {
//    echo "\n", $item['idUso'], "\t\t", $item['idResp'];
//    echo"<br>";
?>