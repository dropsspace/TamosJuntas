<?php

class RegistroUso {
   
   private $mysql;
   
   public function __construct($mysql) {
      $this->mysql = $mysql;
   }

    public function registraUso($dtaAcesso, $filhos, $estuda, $trabalha, $tpRelacionamento) {
        $sql = "INSERT INTO `dbempodera`.`tbuso` (`dataAcesso`, `filhos`, `estuda`, `trabalha`, `tpRelacionamento`) VALUES ('$dtaAcesso','$filhos','$estuda','$trabalha','$tpRelacionamento');";
        mysqli_query($mysql->link, $sql);  
        $idUso = $this->selectIdUso();
        return $idUso;
    }

    public function selectIdUso() {
       $sql = "SELECT `IDuso` FROM `tbuso` GROUP BY `IDuso` ORDER BY `IDuso` DESC LIMIT 1";
       $rs = $this->mysql->query($sql);
       $dados = mysqli_fetch_array($rs, MYSQLI_ASSOC);
        
       return utf8_encode($dados['IDuso']);        
    }

}

?>
