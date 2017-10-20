<?php

include_once 'Pergunta.php';
include_once 'RegistroUso.php';

class Quiz {

    public static $arrayRespostas = array();
    public static $idUso; 
    
    public function construct($dtaAcesso, $filhos, $estuda, $trabalha, $tpRelacionamento)
            {
    self::$idUso = RegistroUso::registraUso($dtaAcesso, $filhos, $estuda, $trabalha, $tpRelacionamento);
               }


    public function salvaResposta($idResp) {
        array_push(self::$arrayRespostas, array("idUso" => self::$idUso, "idResp" => $idResp));
    }

    public function sorteiaPergunta()
            {
        
            }
    

}

//$idUso1 = 11;
//$idResp1 = 22;
//
//Quiz::salvaResposta($idUso1, $idResp1);
//$var = Quiz::exibeArray();
//
//$idUso2 = 14;
//$idResp2 = 24;
//
//Quiz::salvaResposta($idUso2, $idResp2);
//$var = Quiz::exibeArray();
//
//
//foreach ($var as $item) {
//    echo "\n", $item['idUso'], "\t\t", $item['idResp'];
//    echo"<br>";
}
?>