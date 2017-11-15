<?php

class Pergunta {

    private $mysql;

    public function __construct($mysql) {
        $this->mysql = $mysql;
    }

    public function selecionaPergunta($tpPergunta) {
        $sql = "SELECT * FROM tbpergunta WHERE IDtpViolencia = '$tpPergunta'";
        $rs = $this->mysql->query($sql);

        while ($dados = mysqli_fetch_assoc($rs)) {
            $assoc[] = $dados;
        }

        return $assoc;
    }

    public function selecionaTpViolenciaPergunta($idPergunta) {
        $sql = "SELECT IDtpViolencia FROM tbpergunta WHERE IDpergunta = '$idPergunta'";
        $rs = $this->mysql->query($sql);

        while ($dados = mysqli_fetch_assoc($rs)) {
            $assoc[] = $dados;
        }

        print_r($assoc);
        $tpPergunta = $assoc[0]['IDtpViolencia'];

        return $tpPergunta;
    }

    public function selecionaTpViolencia() {
        $sql = "SELECT * FROM tbtipoviolencia";
        $rs = $this->mysql->query($sql);

        while ($dados = mysqli_fetch_assoc($rs)) {
            $assoc[] = $dados;
        }

        return $assoc;
    }

    public function verPergunta($idPergunta) {
        $sql = "SELECT * FROM tbpergunta WHERE  IDpergunta= '$idPergunta'";
        $rs = $this->mysql->query($sql);
        while ($dados = mysqli_fetch_assoc($rs)) {
            $assoc[] = $dados;
        }
        return $assoc;
    }

    public function selecionaRespostas($idPergunta) {
        $sql = "SELECT * FROM tbresposta WHERE IDpergunta = '$idPergunta'";
        $rs = $this->mysql->query($sql);
        while ($dados = mysqli_fetch_assoc($rs)) {
            $assoc[] = $dados;
        }
        return $assoc;
    }

    public function verResposta($idResposta) {
        $sql = "SELECT * FROM tbresposta WHERE IDresposta = '$idResposta'";
        $rs = $this->mysql->query($sql);
        while ($dados = mysqli_fetch_assoc($rs)) {
            $assoc[] = $dados;
        }

        return $assoc;
    }

}

?>