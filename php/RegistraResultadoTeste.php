<?php
include_once 'ConectaBD.php';

class RegistraResultadoTeste {

    public function registaRespostas($idUso, $idResposta) {
        ConectaBD::conectarBanco();
        $sql = "INSERT INTO `dbempodera`.`tbresultadoresposta` (`IdUso`, `IdResposta`) VALUES ('$idUso', '$idResposta');";
        ConectaBD::realizarInsert($sql);
        ConectaBD::fecharBanco();
    }

    public function registaConclusao($idUso, $idViolencia) {
        ConectaBD::conectarBanco();
        $sql = "INSERT INTO `dbempodera`.`tbconclusao` (`idUso`, `idtpViolencia`) VALUES('$idUso', '$idViolencia');";
        ConectaBD::realizarInsert($sql);
        ConectaBD::fecharBanco();
    }
}
?>

