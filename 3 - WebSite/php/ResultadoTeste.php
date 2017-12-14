<?php

include("config.php");

$registra = new RegistraResultadoTeste($mysql);

for ($y = 0; $y < count($_SESSION["respostas"]); $y++) {
    $registra->registaRespostas($_SESSION["id"], $_SESSION["respostas"][$y]);
}
if (count($_SESSION["violenciasIdentificadas"] > 0)) {
    for ($y = 0; $y < count($_SESSION["violenciasIdentificadas"]); $y++) {
        $registra->registaConclusao($_SESSION["id"], $_SESSION["violenciasIdentificadas"][$y]);
    }
} else {
    $registra->registaConclusao($_SESSION["id"], 7);
}

header("Location:ExibeResultado.php");
?>
