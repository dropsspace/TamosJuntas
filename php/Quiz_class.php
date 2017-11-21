<?php

class Quiz {

    private $mysql;
    private $pergunta;

    public function __construct($mysql) {
        $this->mysql = $mysql;
        $this->pergunta = new Pergunta($mysql);
    }

    public function validateste() {

        if ((count($_SESSION["violenciasFinalizadas"]) == 6)) {
            $_SESSION["terminouTeste"] = true;
        }
    }

    public function salvaResposta($idResp) {
        echo'salvou resposta';
        array_push($_SESSION["respostas"], $idResp);
    }

    public function verificaViolência($idResp) {

        if (!is_null($idResp)) {

            $resposta = $this->pergunta->verResposta($idResp);
            //verificar se tem como eu pegar tpViolência a partir da pergunta
            $tpViolencia = $this->pergunta->selecionaTpViolenciaPergunta($resposta[0]['IDpergunta']);

            if (is_null($resposta[0]['simnao'])) {
                //salva no array de violencias identificadas e no arrau de finalizadas  
                array_push($_SESSION["violenciasFinalizadas"], $tpViolencia[0]["IDtpViolencia"]);
                array_push($_SESSION["violenciasIdentificadas"], $tpViolencia[0]["IDtpViolencia"]);
            } else {
                if ($resposta[0]['simnao'] == "Sim") {
                    array_push($_SESSION["violenciasFinalizadas"], $tpViolencia[0]["IDtpViolencia"]);
                    array_push($_SESSION["violenciasIdentificadas"], $tpViolencia[0]["IDtpViolencia"]);
                }
            }
        }
    }

    public function validaPergunta($tpPergunta) {

        $tipoCerto = false;
        $encontrou = false;

        if (count($_SESSION["perguntas"]) > 0) {
            while ($tipoCerto == false) {
                $encontrou = false;
                $idPergunta = $this->sorteiaPergunta($tpPergunta);
                //se houverem perguntas perguntadas
                for ($x = 0; $x < count($_SESSION["perguntas"]); $x++) {
                    if ($idPergunta == ($_SESSION["perguntas"][$x])) {
                        $encontrou = true;
                    }
                }
                //Seu companheiro/a usa seus filhos como chantagem?
                if ($_SESSION["filhos"] == 0 && $idPergunta == 76) {
                    $encontrou = true;
                }
                //Seu companheiro/a impede que você estude?
                if ($_SESSION["estuda"] == 1 && $idPergunta == 7) {
                    $encontrou = true;
                }
                //Seu companheiro/a impede que você trabalhe?
                if ($_SESSION["trabalha"] == 1 && $idPergunta == 9) {
                    $encontrou = true;
                }
                //Seu companheiro/a  já estragou seus instrumentos de trabalho? 
                if ($_SESSION["trabalha"] == 0 && $idPergunta == 49) {
                    $encontrou = true;
                }
                if ($encontrou) {
                    $tipoCerto = false;
                } else {
                    $tipoCerto = true;
                }
            }
        } else {
            $idPergunta = $this->sorteiaPergunta($tpPergunta);
        }
        array_push($_SESSION["perguntas"], $idPergunta);
        //falta controlar quando todas de um tipo x forem perguntadas 
        $pergunta = $this->pergunta->verPergunta($idPergunta);
        return $pergunta;
    }

    public function sorteiaPergunta($tpPergunta) {
        $perguntaselect = $this->pergunta->selecionaPergunta($tpPergunta);
        $indicerrand = rand(0, (count($perguntaselect)) - 1);
        $pergunta = ($perguntaselect[$indicerrand]);
        $idPergunta = $pergunta["IDpergunta"];
        return $idPergunta;
    }

    public function selecionaResposta($idPergunta) {
        $resposta = $this->pergunta->selecionaRespostas($idPergunta);
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
        $tipoCerto = false;

        if (count($_SESSION["violenciasFinalizadas"]) < 6) {
            while ($tipoCerto == false) {
                $encontrou = false;
                $idtpViolencia = $this->sorteiaTipoViolencia();
                for ($y = 0; $y < count($_SESSION["violenciasFinalizadas"]); $y++) {
                    //se houver alguma violenciafinalizada compara o IDtpViolencia com as do vetor
                    if (($idtpViolencia == ($_SESSION["violenciasFinalizadas"][$y]))) {
                        $encontrou = true;
                    }
                }
                if ($encontrou) {
                    $tipoCerto = false;
                } else {
                    $tipoCerto = true;
                }
            }
        }
        return $idtpViolencia;
    }

    public function sorteiaTipoViolencia() {

        $tpviolenciaselect = $this->pergunta->selecionaTpViolencia();
        //porque o vetor começa em 0 e o tipo de violencia 7 n precisa sortear 
        $indicerrand = rand(0, (count($tpviolenciaselect)) - 2);
        $tpviolencia = ($tpviolenciaselect[$indicerrand]);
        $idtpViolencia = $tpviolencia["IDtpViolencia"];
        return $idtpViolencia;
    }

    function controlador($idViolencia) {
        if ($idViolencia == 1) {
            //se a pergunta for do tipo 1, controlador recebe +1 
            $_SESSION["controlador"][1] = $_SESSION["controlador"][1] + 1;
            if ($_SESSION["controlador"][1] == 5) {
                array_push($_SESSION["violenciasFinalizadas"], $idViolencia);
            }
        }
        if ($idViolencia == 2) {
            $_SESSION["controlador"][2] = $_SESSION["controlador"][2] + 1;
            if ($_SESSION["controlador"][2] == 7) {
                array_push($_SESSION["violenciasFinalizadas"], $idViolencia);
            }
        }
        if ($idViolencia == 3) {
            $_SESSION["controlador"][3] = $_SESSION["controlador"][3] + 1;
            if ($_SESSION["controlador"][3] == 6) {
                array_push($_SESSION["violenciasFinalizadas"], $idViolencia);
            }
        }
        if ($idViolencia == 4) {
            $_SESSION["controlador"][4] = $_SESSION["controlador"][4] + 1;
            if ($_SESSION["controlador"][4] == 3) {
                array_push($_SESSION["violenciasFinalizadas"], $idViolencia);
            }
        }
        if ($idViolencia == 5) {
            $_SESSION["controlador"][5] = $_SESSION["controlador"][5] + 1;

            if ($_SESSION["controlador"][5] == 20) {
                array_push($_SESSION["violenciasFinalizadas"], $idViolencia);
            }
        }
        if ($idViolencia == 6) {
            $_SESSION["controlador"][6] = $_SESSION["controlador"][6] + 1;
            if ($_SESSION["controlador"][6] == 13) {
                array_push($_SESSION["violenciasFinalizadas"], $idViolencia);
            }
        }
    }

}

?>