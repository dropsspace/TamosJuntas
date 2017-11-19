<?php

class RegistraResultadoTeste {

    private $mysql;

    public function __construct($mysql) {
        $this->mysql = $mysql;
    }

    public function registaRespostas($idUso, $idResposta) {
        $sql = "INSERT INTO `dbempodera`.`tbresultadoresposta` (`IdUso`, `IdResposta`) VALUES ('$idUso', '$idResposta');";
        mysqli_query($this->mysql->link, $sql);
    }

    public function registaConclusao($idUso, $idViolencia) {
        $sql = "INSERT INTO `dbempodera`.`tbconclusao` (`idUso`, `idtpViolencia`) VALUES('$idUso', '$idViolencia');";
        mysqli_query($this->mysql->link, $sql);
    }

}
?>

