<?php

include_once 'Pergunta.php';
include_once 'RegistroUso.php';

class Quiz {

    public function salvaResposta($idResp) {
        array_push($_SESSION["respostas"], $idResp);
    }

    public function verificaViolência($idResp) {

        if (!is_null($idResp)) {
            $resposta = Pergunta::vevoivrResposta($idResp);
            //verificar se tem como eu pegar tpViolência a partir da pergunta
            $tpViolencia = Pergunta::selecionaTpViolenciaPergunta($resposta[0]['IDpergunta']);

            if (is_null($resposta[0]['simnao'])) {
                //salva no array de violencias identificadas e no arrau de finalizadas  
                array_push($_SESSION["violenciasFinalizadas"] = $tpViolencia[0]["IDtpViolencia"]);
                array_push($_SESSION["violenciasIdentificadas"] = $tpViolencia[0]["IDtpViolencia"]);
            } else {
                if ($resposta[0]['simnao'] == "Sim") {
                    array_push($_SESSION["violenciasFinalizadas"] = $tpViolencia[0]["IDtpViolencia"]);
                    array_push($_SESSION["violenciasIdentificadas"] = $tpViolencia[0]["IDtpViolencia"]);
                }
            }
        }
    }

    public function validaPergunta($tpPergunta) {

        $idPergunta = Quiz::sorteiaPergunta($tpPergunta);
        $tipoCerto = false;

        while ($tipoCerto == false)
        //se houverem perguntas perguntadas
            if (count($_SESSION["perguntas"]) > 0) {
                for ($x = 0; $x < count($_SESSION["perguntas"]); $x++) {
                    if ($idPergunta == ($_SESSION["perguntas"][$x])) {
                        $idPergunta = Quiz::sorteiaPergunta($tpPergunta);
                        $tipoCerto = false;
                        break;
                    } else {
                        $tipoCerto = true;
                    }
                }
            } else {
                $tipoCerto = true;
            }

        array_push($_SESSION["perguntas"], $idPergunta);
        //falta controlar quando todas de um tipo x forem perguntadas 
        $pergunta = Pergunta::verPergunta($idPergunta);

        return $pergunta;
    }

    public function sorteiaPergunta($tpPergunta) {
        $perguntaselect = Pergunta::selecionaPergunta($tpPergunta);
        $indicerrand = rand(0, (count($perguntaselect)) - 1);
        $pergunta = ($perguntaselect[$indicerrand]);
        $idPergunta = $pergunta["IDpergunta"];
        return $idPergunta;
    }

    public function selecionaResposta($idPergunta) {
        $resposta = Pergunta::selecionaRespostas($idPergunta);
        return $resposta;
    }

    public function respostasTeste() {

        foreach ($_SESSION["respostas"] as $arrayFinal) {
            RespostasTeste::resgistaResult($arrayFinal['idUso'], $arrayFinal['idResp']);
        }
    }

    public function resultadoFinal() {
        //se o array tiver identificado todas as 6 violencias 
        if ((count($_SESSION["violenciasFinalizadas"])) == 6) {
            return true;
        } else {
            return false;
        }
    }

    public function validaTipoViolencia() {

        $idtpViolencia = Quiz::sorteiaTipoViolencia();
        $tipoCerto = false;

        while ($tipoCerto == false) {
            //se não houver nenhuma violencia finalizada pode sortear qualquer uma 
            //se houver 6 identificadas encerrou o programa
            if (count($_SESSION["violenciasFinalizadas"]) > 0 && count($_SESSION["violenciasFinalizadas"]) < 7) {
                for ($y = 0; $y < count($_SESSION["violenciasFinalizadas"]); $y++) {
                    //se houver alguma violenciafinalizada compara o IDtpViolencia com as do vetor
                    if (($idtpViolencia == ($_SESSION["violenciasFinalizadas"][$y]))) {
                        $idtpViolencia = Quiz::sorteiaTipoViolencia();
                        $tipoCerto = false;
                        break;
                    } else {
                        $tipoCerto = true;
                    }
                }
            }
        }
        return $idtpViolencia;
    }

    function sorteiaTipoViolencia() {
        $tpviolenciaselect = Pergunta::selecionaTpViolencia();
        //porque o vetor começa em 0 e o tipo de violencia 7 n precisa sortear 
        $indicerrand = rand(0, (count($tpviolenciaselect)) - 2);
        $tpviolencia = ($tpviolenciaselect[$indicerrand]);
        $idtpViolencia = $tpviolencia["IDtpViolencia"];

        return $idtpViolencia;
    }

    function controlador($idViolencia) {
        if ($idViolencia == 1) {
            //se a pergunta for do tipo 1, controlador recebe +1 
            $_SESSION["controlador"][1] + 1;
            if ($_SESSION["controlador"][1] == 5) {
                array_push($_SESSION["violenciasFinalizadas"] = $idViolencia);
            }
        } elseif ($idViolencia == 2) {
            //se a pergunta for do tipo 1, controlador recebe +1 
            $_SESSION["controlador"][2] + 1;
            if ($_SESSION["controlador"][2] == 7) {

                array_push($_SESSION["violenciasFinalizadas"] = $idViolencia);
            }
        } elseif ($idViolencia == 3) {
            //se a pergunta for do tipo 1, controlador recebe +1 
            $_SESSION["controlador"][3] + 1;
            if ($_SESSION["controlador"][3] == 4) {

                array_push($_SESSION["violenciasFinalizadas"] = $idViolencia);
            } elseif ($idViolencia == 4) {
                //se a pergunta for do tipo 1, controlador recebe +1 
                $_SESSION["controlador"][4] + 1;
                if ($_SESSION["controlador"][4] == 3) {

                    array_push($_SESSION["violenciasFinalizadas"] = $idViolencia);
                } elseif ($idViolencia == 5) {
                    //se a pergunta for do tipo 1, controlador recebe +1 
                    $_SESSION["controlador"][5] + 1;
                    if ($_SESSION["controlador"][5] == 22) {

                        array_push($_SESSION["violenciasFinalizadas"] = $idViolencia);
                    } elseif ($idViolencia == 6) {
                        //se a pergunta for do tipo 1, controlador recebe +1 
                        $_SESSION["controlador"][6] + 1;
                        if ($_SESSION["controlador"][6] == 13) {

                            array_push($_SESSION["violenciasFinalizadas"] = $idViolencia);
                        }
                    }
                }
            }
        }
    }

}

?>