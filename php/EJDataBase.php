<?php

include_once("EJDataAdapter.php");

class EJDataBase {

    public function selecionaPergunta($tpPergunta) {
//        $conBanco = new EJDataAdapter();
//        $conBanco->conectarBanco(); 
//        $sql = "SELECT * FROM tbpergunta WHERE IDtpViolencia = $tpPergunta";        
//        return $conBanco->realizaSelect($sql); 

        EJDataAdapter::conectarBanco();
        $sql = "SELECT * FROM tbpergunta WHERE IDtpViolencia = '$tpPergunta'";
        $resultado = EJDataAdapter::realizarSelect($sql);
        EJDataAdapter::fecharBanco();
        return $resultado;
    }

    public function selecionaRespostas($tpPergunta) {
        EJDataAdapter::conectarBanco();
        $sql = "SELECT * FROM tbresposta WHERE IDpergunta = '$idPergunta'";
        $resultado = EJDataAdapter::realizarSelect($sql);
        EJDataAdapter::fecharBanco();
        return $resultado;
    }

}

?>