<?php

include_once("ConectaBD.php");

class Pergunta {

    public function selecionaPergunta($tpPergunta) {
//        $conBanco = new EJDataAdapter();
//        $conBanco->conectarBanco(); 
//        $sql = "SELECT * FROM tbpergunta WHERE IDtpViolencia = $tpPergunta";        
//        return $conBanco->realizaSelect($sql); 

        ConectaBD::conectarBanco();
        $sql = "SELECT * FROM tbpergunta WHERE IDtpViolencia = '$tpPergunta'";
        $resultado = ConectaBD::realizarSelect($sql);
        ConectaBD::fecharBanco();
        return $resultado;
    }

    public function selecionaRespostas($tpPergunta) {
        ConectaBD::conectarBanco();
        $sql = "SELECT * FROM tbresposta WHERE IDpergunta = '$idPergunta'";
        $resultado = ConectaBD::realizarSelect($sql);
        ConectaBD::fecharBanco();
        return $resultado;
    }
    
     public function verResposta($idResposta) {
        ConectaBD::conectarBanco();
        $sql = "SELECT * FROM tbresposta WHERE IDresposta = '$idResposta'";
        $resultado = ConectaBD::realizarSelect($sql);
        ConectaBD::fecharBanco();
        return $resultado;
    }
    
    

}

?>