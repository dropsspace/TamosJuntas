<?php

include_once("ConectaBD.php");

class RegistroUso {

    public function registraUso($dtaAcesso, $filhos, $estuda, $trabalha, $tpRelacionamento) {
        ConectaBD::conectarBanco();
        $sql = "INSERT INTO `dbempodera`.`tbuso` (`dataAcesso`, `filhos`, `estuda`, `trabalha`, `tpRelacionamento`) VALUES ('$dtaAcesso','$filhos','$estuda','$trabalha','$tpRelacionamento');";
        ConectaBD::realizarInsert($sql);
        ConectaBD::fecharBanco();
        $idUso = RegistroUso::selectIdUso();
        return $idUso;
    }

    public function selectIdUso() {
       ConectaBD::conectarBanco();
       $sql = "SELECT `IDuso` FROM `tbuso` GROUP BY `IDuso` ORDER BY `IDuso` DESC LIMIT 1";
       $resultado = ConectaBD::realizarSelect($sql); 
       ConectaBD::fecharBanco();
       
       //retorna somente o id
       return $resultado[0]['IDuso'];
    }

}

?>
