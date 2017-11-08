<?php

class Pergunta {

    private $mysql;

    public function __construct($mysql) {
        $this->mysql = $mysql;
    }

    public function selecionaPergunta($tpPergunta) {
        $sql = "SELECT * FROM tbpergunta WHERE IDtpViolencia = '$tpPergunta'";
        $rs = $this->mysql->query($sql);
        $dados = mysqli_fetch_array($rs, MYSQLI_ASSOC);
        return $dados;
    }

    public function selecionaTpViolenciaPergunta($idPergunta) {
        $sql = "SELECT IDtpViolencia FROM tbpergunta WHERE IDpergunta = '$idPergunta'";
        $rs = $this->mysql->query($sql);
        return $rs;
    }

    public function selecionaTpViolencia() {
        $sql = "SELECT * FROM tbtipoviolencia";
        $rs = $this->mysql->query($sql);
        $dados = mysqli_fetch_array($rs, MYSQLI_ASSOC);
        return $dados;
    }

    public function verPergunta($idPergunta) {
        $sql = "SELECT * FROM tbpergunta WHERE  IDpergunta= '$idPergunta'";
        $rs = $this->mysql->query($sql);
        return $rs;
    }

    public function selecionaRespostas($idPergunta) {
        $sql = "SELECT * FROM tbresposta WHERE IDpergunta = '$idPergunta'";
        $rs = $this->mysql->query($sql);
        return $rs;
    }

    public function verResposta($idResposta) {
        $sql = "SELECT * FROM tbresposta WHERE IDresposta = '$idResposta'";
        $rs = $this->mysql->query($sql);
        return $rs;
    }

}

?>