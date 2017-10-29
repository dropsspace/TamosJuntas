<?php

include_once 'Pergunta.php';
include_once 'RegistroUso.php';


$respostaR1 = Quiz::pegaValor("radio");
echo $respostaR1;
class Quiz {

    public static $arrayRespostas = array();
    public static $idUso;
    public static $arrayResultadoFinal = array();

    public function __construct($dtaAcesso, $filhos, $estuda, $trabalha, $tpRelacionamento) {
        Quiz::registraUso($dtaAcesso, $filhos, $estuda, $trabalha, $tpRelacionamento);
    }

    public function pegaValor() {

        return $_POST['radio'] = (isset($_POST['radio'])) ? $_POST['radio'] : null;
    }

    public function salvaResposta($idResp) {
        array_push(self::$arrayRespostas, array("idUso" => self::$idUso, "idResp" => $idResp));
        Quiz::verificaViolência($idResp);
    }

    public function verificaViolência($idResp) {
        $resposta = Pergunta::verResposta($idResp);
        //verificar se tem como eu pegar tpViolência a partir da pergunta
        $tpViolencia = Pergunta::selecionaTpViolenciaPergunta($resposta[0]['IDpergunta']);

        if (is_null($resposta[0]['simnao'])) {
            array_push(self::$arrayResultadoFinal, array("idUso" => self::$idUso, "idTpViolencia" => $resposta[0]['IDpergunta']));
        } else {
            if ($resposta[0]['simnao'] == 'sim') {
                array_push(self::$arrayResultadoFinal, array("idUso" => self::$idUso, "idTpViolencia" => $tpViolencia));
            }
        }
    }

//Notice: Undefined index: IDpergunta in C:\xampp\htdocs\TamosJuntas\php\Quiz.php on line 43
    public function sorteiaPergunta($tpPergunta) {

        $perguntaselect = Pergunta::selecionaPergunta($tpPergunta);
        $indicerrand = rand(0, (count($perguntaselect)) - 1);
        $pergunta = ($perguntaselect[$indicerrand]);
        $idPergunta = $pergunta["IDpergunta"];

        $controlador = true;
        while ($controlador == true) {
            // if (array_key_exists($pergunta['IDpergunta'], self::$arrayRespostas))
            if (in_array($idPergunta, self::$arrayRespostas)) {
                $perguntaselect = Pergunta::selecionaPergunta($tpPergunta);
                $indicerrand = rand(0, count($perguntaselect) - 1);
                $pergunta = $perguntaselect[$indicerrand];
                //$idPergunta = $pergunta["IDpergunta"];                
            } else {
                $controlador = false;
            }
        }
        //        e se todas tiverem sido perguntadas?
        return $pergunta;
    }

    public function selecionaResposta($idPergunta) {
        $resposta = Pergunta::selecionaRespostas($idPergunta);
        return $resposta;
    }

    public function registraUso($dtaAcesso, $filhos, $estuda, $trabalha, $tpRelacionamento) {
        self::$idUso = RegistroUso::registraUso($dtaAcesso, $filhos, $estuda, $trabalha, $tpRelacionamento);
    }

    public function respostasTeste() {

        foreach (self::$arrayRespostas as $arrayFinal) {
            RespostasTeste::resgistaResult($arrayFinal['idUso'], $arrayFinal['idResp']);
        }
    }

    public function resultadoFinal() {
        if ((count(self::$arrayResultadoFinal)) == 6) {
            return true;
        } elseif ((count(self::$arrayRespostas)) == 54) {
            return true;
        } else {
            return false;
        }
    }

    public function sorteiaTipoViolencia() {
        $tpviolenciaselect = Pergunta::selecionaTpViolencia();
        $indicerrand = rand(0, (count($tpviolenciaselect)) - 2);
        $tpviolencia = ($tpviolenciaselect[$indicerrand]);
        $idtpViolencia = $tpviolencia["IDtpViolencia"];

        $controlador = true;
        while ($controlador == true) {
            if (in_array($idtpViolencia, self::$arrayResultadoFinal)) {
                $tpviolenciaselect = Pergunta::selecionaTpViolencia();
                $indicerrand = rand(0, (count($tpviolenciaselect)) - 2);
                $tpviolencia = ($tpviolenciaselect[$indicerrand]);
                //$idtpViolencia = $tpviolencia["IDtpViolencia"];                
            } else {
                $controlador = false;
            }
        }
        return $tpviolencia;
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