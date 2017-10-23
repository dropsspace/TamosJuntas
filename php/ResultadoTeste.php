<?php

include_once 'ConectaBD.php';

class ResultadoTeste {

    public function resgistaResult($idUso, $idResp) {
        ConectaBD::conectarBanco();
        $sql = "INSERT INTO `dbempodera`.`tbresultadoresposta` (`IDuso`, `IDresposta`) VALUES ('$idUso', '$idResp');";
        ConectaBD::realizarInsert($sql);
        ConectaBD::fecharBanco();
    }

    public function registraConclusao($idUso, $idTpViolencia) {
        
        ConectaBD::conectarBanco();
        $sql = "INSERT INTO `dbempodera`.`tbresultadoconclusao` (`IDuso`, `IDtpViolencia`) VALUES ('$idUso', '$idTpViolencia');";
        $resultado = ConectaBD::realizarInsert($sql);
        ConectaBD::fecharBanco();
    }

   

}

?>