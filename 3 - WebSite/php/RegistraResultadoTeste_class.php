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

    public function getRespostas($idUso) {
        $sql = "SELECT * FROM `dbempodera`.`tbresultadoresposta` WHERE `IDuso` = '$idUso';";
        $rs = $this->mysql->query($sql);
        while ($dados = mysqli_fetch_assoc($rs)) {
            $assoc[] = $dados;
        }

        return $assoc;
    }

}
?>

