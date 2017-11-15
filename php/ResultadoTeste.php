<?php
include("config.php");

$registra = new Quiz($mysql);

include_once 'RegistraResultadoTeste.php';

for ($y = 0; $y < count($_SESSION["respostas"]); $y++) {

    RegistraResultadoTeste::registaRespostas($_SESSION["id"], $_SESSION["respostas"][$y]);
}

for ($y = 0; $y < count($_SESSION["violenciasIdentificadas"]); $y++) {

    RegistraResultadoTeste::registaRespostas($_SESSION["id"], $_SESSION["violenciasIdentificadas"][$y]);
}

?>
