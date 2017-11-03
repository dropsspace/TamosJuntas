<?php
session_start();
include_once 'Pergunta.php';
include_once 'RegistroUso.php';

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
        array_push($_SESSION["respostas"], array("idUso" => self::$idUso, "idResp" => $idResp));
        Quiz::verificaViolência($idResp);
    }

    public function verificaViolência($idResp) {
        //se não vier resposta (caso de Checkbox)não faz nada 
        if (!is_null($idResp)) {
            $resposta = Pergunta::verResposta($idResp);
            //verificar se tem como eu pegar tpViolência a partir da pergunta
            $tpViolencia = Pergunta::selecionaTpViolenciaPergunta($resposta[0]['IDpergunta']);

            if (is_null($resposta[0]['simnao'])) {
                array_push($_SESSION["resultFinal"], array("idUso" => self::$idUso, "idTpViolencia" => $tpViolencia));
            } else {
                if ($resposta[0]['simnao'] == 1) {
                    array_push($_SESSION["resultFinal"], array("idUso" => self::$idUso, "idTpViolencia" => $tpViolencia));
                }
            }
        }
    }

    public function sorteiaPergunta($tpPergunta) {

        $perguntaselect = Pergunta::selecionaPergunta($tpPergunta);
        $indicerrand = rand(0, (count($perguntaselect)) - 1);
        $pergunta = ($perguntaselect[$indicerrand]);
        $idPergunta = $pergunta["IDpergunta"];

        $controlador = true;
        while ($controlador == true) {
            //verifica se ja foi perguntada 
            if (in_array($idPergunta, $_SESSION["respostas"])) {
                $perguntaselect = Pergunta::selecionaPergunta($tpPergunta);
                $indicerrand = rand(0, count($perguntaselect) - 1);
                $pergunta = $perguntaselect[$indicerrand];
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
        return self::$idUso;        
    }

    public function respostasTeste() {

        foreach ($_SESSION["respostas"] as $arrayFinal) {
            RespostasTeste::resgistaResult($arrayFinal['idUso'], $arrayFinal['idResp']);
        }
    }

    public function resultadoFinal() {
        //se o array tiver identificado todas as 6 violencias 
        if ((count($_SESSION["resultFinal"])) == 6) {
            return true;
            //se o array tiver pergutnado todas as perguntas 
        } elseif ((count($_SESSION["respostas"])) == 54) {
            return true;
        } else {
            return false;
        }
    }

    public function sorteiaTipoViolencia() {
        $tpviolenciaselect = Pergunta::selecionaTpViolencia();

        //porque o vetor começa em 0 e o tipo de violencia 7 n precisa sortear 
        $indicerrand = rand(0, (count($tpviolenciaselect)) - 2);
        $tpviolencia = ($tpviolenciaselect[$indicerrand]);

        $idtpViolencia = $tpviolencia["IDtpViolencia"];
        $controlador = true;
        while ($controlador == true) {
            //se no array tiver sido identificado esse tp de violencia
            if (in_array($idtpViolencia, $_SESSION["resultFinal"])) {
                $tpviolenciaselect = Pergunta::selecionaTpViolencia();
                $indicerrand = rand(0, (count($tpviolenciaselect)) - 2);
                $tpviolencia = ($tpviolenciaselect[$indicerrand]);
            } else {
                $controlador = false;
            }
        }
        return $tpviolencia;
    }

}

?>